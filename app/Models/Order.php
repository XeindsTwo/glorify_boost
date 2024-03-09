<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  use HasFactory;

  protected $fillable = [
    'user_id',
    'service_id',
    'service_item_id',
    'source_link',
    'quantity',
    'total_price',
    'status',
  ];

  protected $casts = [
    'quantity' => 'integer',
    'total_price' => 'decimal:2',
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function service()
  {
    return $this->belongsTo(Service::class);
  }

  public function serviceItem()
  {
    return $this->belongsTo(ServiceItem::class);
  }
}