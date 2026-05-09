<?php

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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guest_id')->constrained('guests')->onDelete('cascade');
            $table->string('room_number', 20)->unique();
            $table->enum('room_type',['Single', 'Double','Suite'])->default('Single');
            $table->decimal('price_per_night',8,2);
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->enum('status',['Occupied', 'Available','Maintenance'])->default('Available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
