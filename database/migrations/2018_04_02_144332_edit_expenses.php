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
            $table->string('name', 100)->unique();
            $table->integer('type');
            $table->text('details')->nullable();
            $table->integer('prop_id');
            $table->integer('project_id')->foreign('project_id')->references('id')->on('projects')->nullable();
            $table->integer('service_id')->foreign('service_id')->references('id')->on('services')->nullable();
            $table->integer('compte_id');
            $table->integer('methode_transfert_id');
            $table->decimal('amount', 15, 2)->default(0);
            $table->date('expense_date');
            $table->string('file', 100)->nullable();
            $table->text('remarques')->nullable();
            $table->softDeletes();
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
