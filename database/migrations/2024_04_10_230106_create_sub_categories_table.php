<?php

use App\Models\Category;
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
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('category_id');
            $table->string('name');
            $table->text('slug');
            $table->string('title');
            $table->longtext('description');
            $table->text('keywords');
            $table->smallInteger('status')->default(0);
            $table->smallInteger('is_delete')->default(0);
            $table->Integer('created_by');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_categories');
    }
};
