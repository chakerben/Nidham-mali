<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->unique();
            $table->date('begin_at');
            $table->date('end_at');
            $table->text('details');
            $table->decimal('cost', 15, 2)->default(0);
            $table->text('remarques');
            $table->decimal('benefis', 15, 2)->default(0);
            $table->string('file', 100);
            $table->boolean('finished')->default(0);
            $table->integer('client_id')->foreign('client_id')->references('id')->on('clients');
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
        Schema::dropIfExists('projects');
    }
}
