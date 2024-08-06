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
        Schema::create('page', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('title')->nullable();
            $table->text('image')->nullable();
            $table->text('description')->nullable();
            $table->string('keywords')->nullable();
            $table->timestamps();
        });
    }
/*


contact

about

faq

payment-methods

money-back-guarantee


returns

shippings

terms-conditions

privacy-policy

*/

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page');
    }
};
