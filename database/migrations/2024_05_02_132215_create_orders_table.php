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
            $table->string('customer_id')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('product_title')->nullable();
            $table->string('Product_size')->nullable();
            $table->string('Product_price')->nullable();
            $table->string('Product_image')->nullable();
            $table->string('Product_topping_1')->nullable();
            $table->string('Product_topping_2')->nullable();
            $table->string('Product_topping_3')->nullable();
            $table->string('quantity')->nullable();
            $table->string('extra_toppings')->nullable();
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
