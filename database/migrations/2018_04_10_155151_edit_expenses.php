<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditExpenses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::table('expenses', function (Blueprint $table) {
            $table->foreign('compte_id')->references('id')->on('banc_acounts');
            $table->foreign('methode_transfert_id')->references('id')->on('transfer_methodes');
            $table->renameColumn('prop_id', 'employee_id');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->renameColumn('type', 'type_id');
            $table->foreign('type_id')->references('id')->on('expense_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
