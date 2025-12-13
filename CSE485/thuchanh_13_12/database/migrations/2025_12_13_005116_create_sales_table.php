<?php

use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
    $table->id('sale_id'); // primary key

    // Tạo cột medicine_id để liên kết với bảng medicines
    $table->unsignedBigInteger('medicine_id');
    $table->foreign('medicine_id')
          ->references('medicine_id')
          ->on('medicines')
          ->onDelete('cascade');

    $table->integer('quantity')->default(0);
    $table->dateTime('sales_date')->nullable();
    $table->string('customer_phone')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
