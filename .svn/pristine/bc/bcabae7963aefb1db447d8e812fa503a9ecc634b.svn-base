<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stock_no', 100);
            $table->string('ref_no', 100);
            $table->date('dob');
            $table->enum('type', ['Sales','Purchase','Transfer']);
            $table->string('addressId', 100);
            $table->text('photo');
            $table->string('mobile', 100);
            $table->string('email', 100);
            $table->enum('gender', ['Male','Female']);
            $table->text('uploadPhoto');
            $table->text('proofId');
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
        Schema::dropIfExists('stocks');
    }
}
