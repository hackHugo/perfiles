<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Coperation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_operation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('operation');
            $table->unsignedInteger('id_module');
            $table->timestamps();
            $table->foreign('id_module')->references('id')->on('c_module');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_operation');
    }
}
