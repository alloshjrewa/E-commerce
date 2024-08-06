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
        Schema::create('products', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('title');
            $table->text('slug')->nullable();
            $table->text('sku')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('sub_category_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->double('old_price')->default(0)->nullable();
            $table->double('price')->default(0);
            $table->text('short_description')->nullable();
            $table->longtext('description')->nullable();
            $table->text('additional_information')->nullable();
            $table->text('shipping_returns')->nullable();
            $table->smallInteger('status')->default(0);
            $table->smallInteger('is_delete')->default(0);
            $table->Integer('created_by')->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
