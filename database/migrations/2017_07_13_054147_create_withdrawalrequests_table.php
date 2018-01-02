<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWithdrawalrequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdrawalrequests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('userId',30);
            $table->string('tcnId',30);
            $table->string('unit',30);
            $table->string('amount',30);
            $table->dateTime('approvedDate');
            $table->integer('approvedId');
            $table->integer('deniedId');
            $table->dateTime('deniedDate');
            $table->dateTime('appliedDate');
            $table->enum('type', ['Partial Withdrawal', 'Noraml Withdrawal', 'Emergency Withdrawal']);
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
        Schema::dropIfExists('withdrawalrequests');
    }
}
