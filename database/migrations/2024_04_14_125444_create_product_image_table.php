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
        Schema::create('product_image', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('product_id');
            $table->text('image_name');
            $table->string('image_extension')->nullable();
            $table->integer('order_by')->default(100);
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_image');
    }
};
