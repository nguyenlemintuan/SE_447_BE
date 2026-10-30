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
        Schema::create('du_lieu_chats', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->text('embedding')->nullable(); // Sẽ lưu dưới dạng JSON mảng các số thực
            $table->string('hash')->unique(); // Quan trọng để tránh train trùng
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('du_lieu_chats');
    }
};
