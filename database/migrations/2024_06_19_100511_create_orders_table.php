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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('order_number');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company_name');
            $table->string('country');
            $table->string('address_one');
            $table->string('address_two');
            $table->string('city');
            $table->string('state');
            $table->string('postalcode');
            $table->string('phone');
            $table->string('email');
            $table->text('note');
            $table->string('discount_code');
            $table->double('discount_amount');
            $table->Integer('shipping_id');
            $table->double('shipping_amount');
            $table->double('total_amount');
            $table->string('payment_method');
            $table->smallInteger('status')->default(0);
            $table->smallInteger('is_delete')->default(0);
            $table->smallInteger('is_payment')->default(0);
            // $table->string('transaction_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
