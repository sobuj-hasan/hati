<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartorders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->integer('customer_country');
            $table->string('customer_city');
            $table->string('customer_address');
            $table->string('customer_postcode');
            $table->text('customer_message');
            $table->integer('discount');
            $table->float('subtotal');
            $table->float('total');
            $table->integer('payment_option')->comment('1=Online pay, 2=cash on');
            $table->integer('payment_status')->comment('1=pending, 2=done');
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
        Schema::dropIfExists('cartorders');
    }
}
