<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
  public function index()
  {
    $services = Service::all();
    return view('admin.manage_services', compact('services'));
  }

  public function create(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'logo' => 'nullable|file|mimes:svg,png,jpg,webp|max:2048',
    ]);

    $logoName = null;
    if ($request->hasFile('logo')) {
      $logoName = $request->file('logo')->hashName();
      $request->file('logo')->storeAs('public/logos', $logoName);
    }

    $service = Service::create([
      'name' => $request->name,
      'logo' => $logoName,
    ]);

    return response()->json(['message' => 'Сервис успешно создан', 'service' => $service]);
  }

  public function update(Request $request, Service $service)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'logo' => 'nullable|file|mimes:svg,png,jpg,webp|max:2048',
    ]);

    $service->name = $request->name;
    if ($request->hasFile('logo')) {
      $logoName = $request->file('logo')->hashName();
      if ($service->logo) {
        Storage::delete('public/logos/' . $service->logo);
      }
      $request->file('logo')->storeAs('public/logos', $logoName);
      $service->logo = $logoName;
    }

    $service->save();
    return response()->json(['message' => 'Сервис успешно обновлен', 'service' => $service]);
  }

  public function destroy(Service $service)
  {
    $service->delete();
    return response()->json(['message' => 'Сервис успешно удалён']);
  }
}