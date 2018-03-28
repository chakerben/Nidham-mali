<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('amount', 15, 2)->default(0);
            $table->string('type', 20);
            $table->date('date_payment')->nullable();
            $table->string('file', 100)->nullable();
            $table->integer('chek_number')->nullable();
            $table->string('paypal_acount', 100)->nullable();
            $table->integer('bank_to_id');#->foreign('bank_to_id')->references('id')->on('banks');
            $table->integer('tranche_id')->foreign('tranche_id')->references('id')->on('tranches');
            $table->integer('bank_from_id')->nullable();#->foreign('bank_from_id')->references('id')->on('banks');
            $table->integer('person_transfer_id')->nullable();#->foreign('person_transfer_id')->references('id')->on('banks');            
            $table->softDeletes();
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
        Schema::dropIfExists('payments');
    }
}
