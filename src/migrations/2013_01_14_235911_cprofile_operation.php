<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CprofileOperation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_operation', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_profile');
            $table->unsignedInteger('id_operation');
            $table->timestamps();
            $table->foreign('id_profile')->references('id')->on('c_profile');
            $table->foreign('id_operation')->references('id')->on('c_operation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_operation');
    }
}
