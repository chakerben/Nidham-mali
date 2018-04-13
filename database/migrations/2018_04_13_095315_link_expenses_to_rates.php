<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LinkExpensesToRates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_rate', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('expense_id')->foreign('expense_id')->references('id')->on('expenses');
            $table->integer('rate_id')->foreign('rate_id')->references('id')->on('rates');
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
        Schema::dropIfExists('expense_rate');
    }
}
