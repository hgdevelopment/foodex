<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('userId')->default('userid not entered ');
            $table->string('bankName', 200);
            $table->string('branchName', 100);
            $table->string('ifsc', 100);
            $table->string('accountHolderName', 100);
            $table->string('accountNumber',100);
            $table->string('place',100)->default('place not entered ');
            $table->enum('typeOfAccount',['Heera Accounts','Benefit'])->default('not entered ');
            $table->string('country',100);
            $table->string('ibanNumber',100)->default('iban number not entered ');;
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
        Schema::dropIfExists('banks');
    }
}
