<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBancAcountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banc_acounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bank_name', 100);
            $table->string('count_num', 11)->unique();
            $table->decimal('init_amount', 15, 2)->default(0);
            $table->string('iban', 100);
            $table->string('percent_name', 100)->nullable();
            $table->decimal('percent_valu', 5, 2)->nullable();
            $table->decimal('total_amount', 15, 2)->default(0);
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
        Schema::dropIfExists('banc_acounts');
    }
}
