<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberregistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberregistrations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId');
            $table->string('code',25);
            $table->string('name',225);
            $table->string('guardian',255);
            $table->dateTime('dob');
            $table->string('maritalStatus',255);
            $table->string('noOfChildren',255);
            $table->string('gender',225);
            $table->string('religion',225);
            $table->string('caste',225);
            $table->string('education',225);
            $table->string('occupation',225);
            $table->text('photo');
            $table->text('singnature');
            $table->integer('countryId');
            $table->string('mobileNo',225);
            $table->string('email');
            $table->string('reference',225)->nullable();
            $table->integer('addedById')->nullable();
            $table->enum('addedByUnder',['myself','me','dsa','emp','oi']);
            $table->dateTime('addedByDate')->nullable();
            $table->string('deniedReason',225)->nullable();
            $table->dateTime('deniedDate')->nullable();
            $table->integer('deniedId')->nullable();
            $table->dateTime('approvedDate')->nullable();
            $table->integer('approvedId')->nullable();
            $table->integer('blockedId')->nullable();
            $table->decimal('incomeAmount',50,2)->nullable();
            $table->string('incomeCurrencytype',225)->nullable();
            $table->mediumText('membership_details')->nullable();
            
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
        Schema::dropIfExists('memberregistrations');
    }
}
