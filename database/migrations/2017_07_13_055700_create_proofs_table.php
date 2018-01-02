<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProofsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proofs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId');
            $table->integer('nomineeId')->nullable();
            $table->enum('typeOfProof',['aadhar', 'license', 'pancard','passport']);
            $table->string('proofNumber',225);
            $table->string('placeOfIssue',225);
            $table->dateTime('dateOfIssue');
            $table->dateTime('dateOfExpiry');
            $table->text('file')->nullable();
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
        Schema::dropIfExists('proofs');
    }
}
