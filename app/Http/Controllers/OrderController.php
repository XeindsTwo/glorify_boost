<?php

namespace App\Http\Controllers;

use App\Models\BalanceTransaction;
use App\Models\Order;
use App\Models\Service;
use App\Models\ServiceItem;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
  public function userOrders()
  {
    $user = Auth::user();
    $orders = Order::where('user_id', $user->id)
      ->orderBy('created_at', 'desc')
      ->get();

    return view('panel.my_orders', compact('orders'));
  }

  public function allOrders()
  {
    $orders = Order::all();
    return view('admin.all_orders', compact('orders'));
  }

  public function create()
  {
    $services = Service::has('serviceItems')->get();
    $serviceItems = ServiceItem::all();

    return view('panel.order', compact('services', 'serviceItems'));
  }

  public function store(Request $request)
  {
    try {
      $validatedData = $request->validate([
        'source_link' => 'required|string|max:300',
        'quantity' => 'required|integer|min:50|max:13500',
        'service_item_id' => 'required|exists:service_items,id',
      ]);

      $serviceItem = ServiceItem::findOrFail($validatedData['service_item_id']);
      $totalPrice = $serviceItem->price_high * $validatedData['quantity'];

      $user = Auth::user();
      $userBalance = $user->balance;

      if ($userBalance->balance < $totalPrice) {
        return response()->json(['message' => 'Недостаточно средств для создания заказа. Пожалуйста, пополните баланс'], 400);
      }

      $userBalance->balance -= $totalPrice;
      $userBalance->save();

      $order = new Order();
      $order->user_id = $user->id;
      $order->service_id = $serviceItem->service_id;
      $order->service_item_id = $validatedData['service_item_id'];
      $order->source_link = $validatedData['source_link'];
      $order->quantity = $validatedData['quantity'];
      $order->total_price = $totalPrice;
      $order->status = 'В обработке';
      $order->save();

      $transaction = new BalanceTransaction([
        'user_id' => $user->id,
        'amount' => -$totalPrice,
        'type' => 'Выполнение заказа #' . $order->id,
      ]);
      $transaction->save();

      return response()->json(['message' => 'Заказ успешно создан', 'order' => $order]);
    } catch (ValidationException $e) {
      return response()->json(['error' => 'Ошибка валидации', 'message' => $e->getMessage()], 400);
    } catch (ModelNotFoundException $e) {
      return response()->json(['error' => 'Заказ не был найден', 'message' => $e->getMessage()], 404);
    } catch (Exception $e) {
      return response()->json(['error' => 'Ошибка сервера', 'message' => $e->getMessage()], 500);
    }
  }

  public function cancelOrder($orderId)
  {
    try {
      $order = Order::findOrFail($orderId);
      if ($order->status === 'Отменено') {
        return response()->json(['error' => 'Заказ уже отменен'], 400);
      }

      $order->status = 'Отменен';
      $order->save();

      $userBalance = $order->user->balance;
      $userBalance->balance += $order->total_price;
      $userBalance->save();

      $transaction = new BalanceTransaction([
        'user_id' => $order->user->id,
        'amount' => $order->total_price,
        'type' => 'Возврат за заказ #' . $order->id,
      ]);
      $transaction->save();

      return response()->json(['message' => 'Заказ успешно отменен']);
    } catch (ModelNotFoundException) {
      return response()->json(['error' => 'Заказ не найден'], 404);
    } catch (Exception $e) {
      return response()->json(['error' => 'Ошибка сервера', 'message' => $e->getMessage()], 500);
    }
  }
}