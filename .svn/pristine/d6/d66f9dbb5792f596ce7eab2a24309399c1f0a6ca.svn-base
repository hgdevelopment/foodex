<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReassignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reassigns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('userId',30);
            $table->integer('assignId');
            $table->dateTime('assignDate');
            $table->integer('reassignId');
            $table->dateTime('reassignDate');
            $table->integer('assignedId');
            $table->dateTime('assignedDate');
            $table->integer('reassignedId');
            $table->dateTime('reassignedDate');
            $table->enum('type', ['DSA', 'MEMBER', 'ME']);
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
        Schema::dropIfExists('reassigns');
    }
}
