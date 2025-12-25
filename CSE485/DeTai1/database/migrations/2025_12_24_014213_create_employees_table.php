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
        Schema::create('employees', function (Blueprint $table) {
            $table->id('id_employee');
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id_department')->on('departments')->onDelete('cascade');
            $table->string('name_employee', 100)->nullable(false);
            $table->string('email_employee', 100)->unique()->nullable(false);
            $table->string('phone_employee', 30)->nullable();
            $table->string('position_employee', 100)->nullable();
            $table->decimal('salary_employee', 10, 2)->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
