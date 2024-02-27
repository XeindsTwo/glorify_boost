<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function updateName(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:50|regex:/^[A-Za-zА-Яа-яЁё\-]+$/u',
        ]);

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->save();

        return response()->json(['success' => 'Имя успешно обновлено']);
    }

    public function updateEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:80|unique:users,email',
        ]);
        $user = Auth::user();
        $user->email = $request->input('email');
        $user->save();

        return response()->json(['success' => 'Почта успешно обновлена']);
    }
}
