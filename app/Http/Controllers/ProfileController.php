<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

    public function updateAvatar(Request $request)
    {
        try {
            $request->validate([
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
            ]);

            $user = Auth::user();
            if ($user->avatar) {
                Storage::delete('public/avatars/' . $user->avatar);
            }

            $avatarPath = $request->file('avatar')->store('public/avatars');
            $avatarName = basename($avatarPath);
            $user->avatar = $avatarName;
            $user->save();
            return response()->json(['success' => 'Аватар успешно обновлен']);
        } catch (Exception $e) {
            return response()->json(['error' => 'Ошибка при обновлении аватара: ' . $e->getMessage()], 500);
        }
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => [
                'required',
                'string',
                'min:8',
                'max:60',
                'different:old_password',
                function ($attribute, $value, $fail) use ($request) {
                    $similar = similar_text($request->old_password, $value, $percent);
                    if ($similar >= 80) {
                        $fail('Новый пароль слишком похож на старый');
                    }
                },
            ],
            'repeat_password' => 'required|same:new_password',
        ]);

        $user = Auth::user();
        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json(['error' => 'Неверно введён старый пароль']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();
        return response()->json(['success' => 'Пароль успешно обновлен']);
    }
}
