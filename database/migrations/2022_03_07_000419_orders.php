<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orders extends Migration
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
            $table->integer('user_id');
            $table->string('user_phone_number');
            $table->string('user_name');
            $table->string('user_address');
            $table->string('user_email');
            $table->string('payment_type')->comment('cash, card');
            $table->string('notes');
            $table->string('city');
            $table->integer('shipping_type')->comment('1 = home, 2 = local pickup');
            $table->float('sub_total');
            $table->float('delivery_cost');
            $table->date('placed_time');
            $table->date('preparing_date');
            $table->date('dispatching_date');
            $table->date('delivered_date');
            $table->integer('status')->comment('1 = placed, 2 = preparing, 3 = dispatching, 4 = delivered');
            $table->text('cart');
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
