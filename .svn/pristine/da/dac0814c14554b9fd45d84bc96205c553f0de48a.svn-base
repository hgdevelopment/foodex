<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTcnrequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tcnrequests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('userId', 100);
            $table->string('tcn_id', 100);
            $table->string('nominee_id', 100);
            $table->string('benefitId', 100);
            $table->string('heeraAccountId', 100);
            $table->string('addedId', 100);
            $table->string('doc1', 100);
            $table->string('doc2', 100);
            $table->string('doc3', 100);
            $table->string('currenyType', 100);
            $table->string('unit', 100);
            $table->string('amount', 100);
            $table->string('paymentMode', 100);
            $table->string('depositeDate', 100);
            $table->enum('transactionNumber', ['DD', 'Cheque']);
            $table->string('applyingForm', 100);
            $table->date('addedDate');
            $table->date('approvedDate');
            $table->string('deniedId', 100);
            $table->string('reason', 255);
            $table->enum('paymentReceived', ['Yes', 'No']);
            $table->date('paymentReceivedDate');
            $table->string('withDrawId',100);
            $table->enum('withDrawStatus', ['Applied','Approved','Denied']);
            $table->enum('docVerified',['Pending','Verified']);
            $table->date('docVerifiedDate');
            $table->enum('status', ['Pending', 'Approved', 'Denied']);
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
        Schema::dropIfExists('tcnrequests');
    }
}
