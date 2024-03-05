<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserBalance extends Model
{
  protected $fillable = [
    'user_id',
    'balance'
  ];

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  public function getBalance(): float
  {
    return $this->balance;
  }
}
