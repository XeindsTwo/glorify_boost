<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void
  {
    Schema::create('orders', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('user_id');
      $table->unsignedBigInteger('service_id');
      $table->unsignedBigInteger('service_item_id');
      $table->text('source_link', 300);
      $table->integer('quantity');
      $table->decimal('total_price', 10, 2);
      $table->enum('status', ['В обработке', 'Отменен', 'Завершено'])->default('В обработке');
      $table->timestamps();

      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
      $table->foreign('service_item_id')->references('id')->on('service_items')->onDelete('cascade');
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('orders');
  }
};
