<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceItem;
use Illuminate\Http\Request;

class ServiceItemController extends Controller
{
  public function store(Request $request)
  {
    $service = Service::findOrFail($request->service_id);

    $validatedData = $request->validate([
      'name' => 'required|string|max:255',
      'price_low' => 'required|numeric',
      'price_medium' => 'required|numeric',
      'price_high' => 'required|numeric',
    ]);

    ServiceItem::create([
      'service_id' => $service->id,
      'name' => $validatedData['name'],
      'price_low' => $validatedData['price_low'],
      'price_medium' => $validatedData['price_medium'],
      'price_high' => $validatedData['price_high'],
    ]);

    return redirect()->back()->with('success', 'Услуга успешно создана');
  }

  public function destroy($id)
  {
    $serviceItem = ServiceItem::findOrFail($id);
    $serviceItem->delete();

    return response()->json(['message' => 'Элемент успешно удален']);
  }

  public function update(Request $request, $id)
  {
    $serviceItem = ServiceItem::findOrFail($id);

    $validatedData = $request->validate([
      'name' => 'required|string|max:255',
      'price_low' => 'required|numeric',
      'price_medium' => 'required|numeric',
      'price_high' => 'required|numeric',
    ]);

    $serviceItem->update([
      'name' => $validatedData['name'],
      'price_low' => $validatedData['price_low'],
      'price_medium' => $validatedData['price_medium'],
      'price_high' => $validatedData['price_high'],
    ]);

    return response()->json(['message' => 'Элемент успешно обновлен', 'serviceItem' => $serviceItem]);
  }
}