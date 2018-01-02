<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDsasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dsas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('userId');
            $table->string('name', 100);
            $table->string('companyName',100);
            $table->string('email');
            $table->string('mobileNumber',100);
            $table->string('guardian',100);
            $table->date('dob');
            $table->string('religion',100);
            $table->string('caste',100);
            $table->string('countryId');
            $table->enum('gender',['male', 'female']);
            $table->string('bloodGroup',100);
            $table->string('maritalStatus',100);
            $table->text('photo');
            $table->text('signature');
            $table->longText('reference',100);
            $table->string('addedId');
            $table->dateTime('addedDate');
            $table->string('approvedId');
            $table->dateTime('approvedDate');
            $table->string('deniedId',100);
            $table->dateTime('deniedDate');
            $table->string('blockedId');
            $table->dateTime('blockedDate');
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
        Schema::dropIfExists('dsas');
    }
}
