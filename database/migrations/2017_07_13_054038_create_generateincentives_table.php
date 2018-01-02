<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenerateincentivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generateincentives', function (Blueprint $table) {
            $table->increments('id');
            $table->date('month');
            $table->date('year');
            $table->decimal('salary',10,2);
            $table->decimal('target',10,2);
            $table->decimal('achievedAmount',10,2);
            $table->decimal('incentivePercentage',10,2);
            $table->decimal('extraAmount',10,2);
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
        Schema::dropIfExists('generateincentives');
    }
}
