<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->bigIncrements('id');
            //
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('state');
            $table->string('city');
            $table->string('street');
            $table->integer('number');
            $table->integer('zip');
            $table->float('lon',11,8);
            $table->float('lat',11,8);
            $table->integer('views');
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            //
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
        Schema::dropIfExists('apartments');
    }
}
