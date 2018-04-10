<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('banc_acount_from_id')->foreign('banc_acount_from_id')->references('id')->on('banc_acounts');
            $table->integer('banc_acount_to_id')->foreign('banc_acount_to_id')->references('id')->on('banc_acounts');
            $table->decimal('transfer_amount', 15, 2)->default(0);
            //$table->integer('percent_id')->foreign('percent_id')->references('id')->on('percents');
            $table->string('file', 100)->nullable();
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
        Schema::dropIfExists('transfers');
    }
}
