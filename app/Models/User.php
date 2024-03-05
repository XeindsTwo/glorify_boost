<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
  use HasFactory, Notifiable;

  protected $fillable = [
    'login',
    'name',
    'email',
    'balance',
    'password',
    'role',
    'avatar'
  ];

  public function balance(): HasOne
  {
    return $this->hasOne(UserBalance::class);
  }
}

//rimiwil827@tupanda.com
//raysmorgan
//qynoruvy@finews.biz