<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');

            // $table->boolean('wi-fi');
            // $table->boolean('parking');
            // $table->boolean('reception');
            // $table->boolean('sauna');
            // $table->boolean('swimming_pool');
            // $table->boolean('seasight');

            // qui dichiaro la relazione tra tabella apartments e tabella services
            //$table->foreign('_id')->references('id')->on('users');

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
        Schema::dropIfExists('services');
    }
}
