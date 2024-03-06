<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'logo'];

  public function serviceItems(): HasMany
  {
    return $this->hasMany(ServiceItem::class);
  }
}
