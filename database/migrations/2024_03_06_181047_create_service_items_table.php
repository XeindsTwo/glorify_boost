<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void
  {
    Schema::create('service_items', function (Blueprint $table) {
      $table->id();
      $table->foreignId('service_id')->constrained()->onDelete('cascade');
      $table->string('name');
      $table->decimal('price_low', 10, 2)->nullable();
      $table->decimal('price_medium', 10, 2)->nullable();
      $table->decimal('price_high', 10, 2)->nullable();
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('service_items');
  }
};