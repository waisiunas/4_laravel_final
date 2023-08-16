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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('total_quantity');
            $table->integer('damaged_quantity')->nullable();
            $table->integer('sold_quantity')->nullable();
            $table->integer('current_quantity')->nullable();
            $table->string('wall_no')->nullable();
            $table->string('section')->nullable();
            $table->string('rack_no')->nullable();
            $table->string('shelf_no')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
