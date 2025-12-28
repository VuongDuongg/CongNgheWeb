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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('member_code', 20)->unique()->notNullable(); // member_code VARCHAR(20), UNIQUE, NOT NULL
            $table->string('fullname', 100)->notNullable(); // fullname VARCHAR(100), NOT NULL
            $table->string('email', 100)->unique()->notNullable(); // email VARCHAR(100), UNIQUE, NOT NULL
            $table->string('phone', 20)->nullable(); // phone VARCHAR(20)
            $table->enum('membership_type', ['Basic', 'Premium', 'VIP'])->default('Basic'); // membership_type            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
