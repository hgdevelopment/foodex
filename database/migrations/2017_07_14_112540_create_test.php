<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('nomis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('userId', 100);
            $table->string('name', 100);
            $table->date('dob');
            $table->enum('relationWithApplicant', ['Father','Mother','Brother','Sister','Husband','Wife','Son','Daughter']);
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
        //
    }
}
