<?php

namespace App\Http\Controllers;

use App\Models\BalanceTransaction;
use App\Models\UserBalance;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
{
  public function show()
  {
    $user = Auth::user();
    $transactions = BalanceTransaction::where('user_id', $user->id)
      ->orderBy('created_at', 'desc')
      ->get();

    return view('panel.balance', ['transactions' => $transactions]);
  }

  public function deposit(Request $request)
  {
    $user = Auth::user();
    $amount = $request->input('amount');
    if ($user && $amount > 0) {
      $transaction = new BalanceTransaction([
        'user_id' => $user->id,
        'amount' => $amount,
        'type' => 'Пополнение'
      ]);

      $transaction->save();
      $user->balance()->increment('balance', $amount);
      return response()->json(['amount' => $amount]);
    } else {
      return response()->json(['error' => 'Ошибка при пополнении баланса']);
    }
  }

  public function getAllTransactions()
  {
    $transactions = BalanceTransaction::orderBy('created_at', 'desc')->get();
    return view('admin.manage_transactions', ['transactions' => $transactions]);
  }

  public function cancelPayment(Request $request, $transactionId)
  {
    try {
      $transaction = BalanceTransaction::findOrFail($transactionId);
      if ($transaction->cancelled) {
        return response()->json(['error' => 'Платеж уже отменен.'], 400);
      }

      // платеж как отмененный
      $transaction->update(['cancelled' => true]);
      // новая запись о возврате средств
      $refundTransaction = new BalanceTransaction([
        'user_id' => $transaction->user_id,
        'amount' => $transaction->amount * -1,
        'type' => 'Возврат средств',
      ]);
      $refundTransaction->save();
      $userBalance = UserBalance::where('user_id', $transaction->user_id)->firstOrFail();
      $userBalance->balance -= $transaction->amount;
      $userBalance->save();

      return response()->json([
        'message' => 'Платеж успешно отменен.',
        'refundTransaction' => [
          'id' => $refundTransaction->id,
          'user_id' => $refundTransaction->user_id,
          'amount' => $refundTransaction->amount,
          'type' => $refundTransaction->type,
          'created_at' => $refundTransaction->created_at->format('Y-m-d H:i:s'),
          'user' => $refundTransaction->user->login
        ]
      ]);
    } catch (Exception) {
      return response()->json(['error' => 'Произошла ошибка при отмене платежа.'], 500);
    }
  }
}
