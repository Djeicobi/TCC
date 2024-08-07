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
        Schema::create('photo_carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')
                  ->references('id')->on('carts')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
                  $table->foreignId('photo_id')
                  ->references('id')->on('photos')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photo_carts');
    }
};
