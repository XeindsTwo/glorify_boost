<?php

namespace App\Http\Controllers;

use App\Models\BalanceTransaction;
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
            return response()->json(['message' => 'Баланс успешно пополнен']);
        } else {
            return response()->json(['error' => 'Ошибка при пополнении баланса']);
        }
    }
}
