<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTcnmastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tcnmasters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tcnType', 100);
            $table->string('inr', 100);
            $table->string('aed', 100);
            $table->string('usd', 100);
            $table->string('sar', 100);
            $table->string('cad', 100);
            $table->string('duration', 100);
            $table->string('openStatus', 100);
            $table->date('openOn', 100);
            $table->date('closeOn', 100);
            $table->string('profitDeclaration', 100);
            $table->string('certificateDmcc', 100);
            $table->string('indianCertificate', 100);
            $table->string('header', 100);
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
        Schema::dropIfExists('tcnmasters');
    }
}
