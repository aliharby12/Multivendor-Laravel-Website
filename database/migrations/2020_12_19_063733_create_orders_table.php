<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->enum('status', ['pending', 'processing', 'completed', 'decline'])->default('pending');
            $table->float('total');
            $table->integer('item_count');
            $table->boolean('is_paid')->default(false);
            $table->string('shipping_fullname');
            $table->string('shipping_address');
            $table->string('shipping_city');
            $table->string('shipping_state');
            $table->string('shipping_zipcode');
            $table->string('shipping_phone');
            $table->string('shipping_notes')->nullable();
            $table->string('billing_fullname');
            $table->string('billing_address');
            $table->string('billing_city');
            $table->string('billing_state');
            $table->string('billing_zipcode');
            $table->string('billing_phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
