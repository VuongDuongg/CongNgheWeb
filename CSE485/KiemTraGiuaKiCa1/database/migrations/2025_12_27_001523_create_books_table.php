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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')
                ->constrained('members') // FK → members.id
                ->onDelete('cascade');   // Xóa sách nếu thành viên bị xóa

            $table->string('title', 255)->notNullable();  // title VARCHAR(255), NOT NULL
            $table->string('author', 100)->notNullable(); // author VARCHAR(100), NOT NULL
            $table->string('isbn', 20)->unique()->nullable(); // isbn VARCHAR(20), UNIQUE
            $table->integer('publication_year')->nullable();  // publication_year INT
            $table->integer('copies_available')->default(0);  // copies_available INT, DEFAULT 0
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
