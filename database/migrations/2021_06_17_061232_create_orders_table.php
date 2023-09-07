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
            $table->foreignId('user_id')->constrained('users');
            $table->string('delivery_type');
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('coupon_code')->nullable();
            $table->string('coupon_amount')->nullable();
            $table->date('order_date');
            $table->string('order_time');
            $table->text('comments')->nullable();
            $table->string('payment_method');
            $table->string('order_status');
            $table->string('transaction_id')->nullable();
            $table->string('payment_status')->nullable();
            $table->float('shipping_charges')->nullable();
            $table->float('grand_total');
            $table->integer('is_seen')->default(0);
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
