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
        Schema::create('brands', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('name');
            $table->text('slug')->nullable();
            $table->string('title')->nullable();
            $table->longtext('description')->nullable();
            $table->text('keywords')->nullable();
            $table->Integer('created_by');
            $table->smallInteger('status')->default(0);
            $table->smallInteger('is_delete')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
