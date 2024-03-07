<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceItem extends Model
{
  use HasFactory;

  protected $fillable = ['service_id', 'name', 'price_low', 'price_medium', 'price_high'];

  public function service(): BelongsTo
  {
    return $this->belongsTo(Service::class);
  }
}