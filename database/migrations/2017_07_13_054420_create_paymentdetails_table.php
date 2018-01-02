<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymentdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code',100);
            $table->string('transactionNumber',50);
            $table->string('amount',50);
            $table->enum('payment_mode',['cheque','DD','online','other']);
            $table->enum('type',['Heera payment','Member Paymenet','DSA Payment','ME Payment']);
            $table->dateTime('paymentDate');
            $table->integer('tcnId');
            $table->integer('userId');
            $table->dateTime('addedDate');
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
        Schema::dropIfExists('paymentdetails');
    }
}
