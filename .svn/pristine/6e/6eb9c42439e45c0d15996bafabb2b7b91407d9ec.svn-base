<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncentivemastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incentivemasters', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('salary',10,2);
            $table->decimal('fromAmount', 10,2);
            $table->decimal('toAmount', 10,2);
            $table->decimal('target', 10,2);
            $table->decimal('incentivePercentage',10,2);
            $table->string('employeeType', 100);
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
        Schema::dropIfExists('incentivemasters');
    }
}
