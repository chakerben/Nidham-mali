<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEmployees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::table('employees', function (Blueprint $table) {
            $table->string('name', 100)->unique();
            $table->integer('role_id')->foreign('role_id')->references('id')->on('roles');
            $table->text('details')->nullable();
            $table->integer('transfer_method_id')->foreign('transfer_method_id')->references('id')->on('transfer_methodes');
            $table->string('file', 100)->nullable();
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
        schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('role_id');
            $table->dropColumn('details');
            $table->dropColumn('transfer_method_id');
            $table->dropColumn('file');
        });
    }
}
