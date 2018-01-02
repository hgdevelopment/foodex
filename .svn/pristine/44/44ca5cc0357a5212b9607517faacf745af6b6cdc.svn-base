<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->increments('id');
            $table->text('category');
            $table->enum('type',['Member','DSA','Other']);
            $table->string('userCode',100);
            $table->dateTime('appiedDate');
            $table->text('description');
            $table->string('name',100);
            $table->string('email',100);
            $table->string('mobile',100);
            $table->integer('assignedId');
            $table->integer('assignedById');
            $table->dateTime('assignedDate');
            $table->enum('solvedStatus',['Open','Close','Proccesing']);
            $table->dateTime('solvedDate');
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
        Schema::dropIfExists('enquiries');
    }
}
