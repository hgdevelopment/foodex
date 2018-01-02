<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBenefitgenerationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benefitgenerations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('userId');
            $table->enum('tcnType',['A','E','G','F','Z']);
            $table->enum('currencyType',['INR','CAD','SAR','AED','USD']);
            $table->date('year');
            $table->date('month');
            $table->string('bankAccountId');
            $table->string('benefitType',100);
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
        Schema::dropIfExists('benefitgenerations');
    }
}
