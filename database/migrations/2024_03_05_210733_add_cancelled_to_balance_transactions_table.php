<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up(): void
  {
    Schema::table('balance_transactions', function (Blueprint $table) {
      $table->boolean('cancelled')->default(false)->after('type');
    });
  }
};
