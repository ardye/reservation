<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableReview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('review', function (Blueprint $table) {
            $table->increments('idReview');
            $table->string('review', 200);
            $table->decimal('rating', 10,1);
            $table->integer('idUser')->unsigned();
            $table->integer('idMenu')->unsigned();
            $table->timestamps();

            $table->foreign('idMenu')->references('idMenu')->on('menu')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idUser')->references('idUser')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review');
    }
}
