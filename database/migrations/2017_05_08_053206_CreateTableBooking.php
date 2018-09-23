<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBooking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->increments('idBooking');
            $table->integer('idUser')->unsigned();
            $table->dateTime('waktu');
            $table->string('jumlah');
            $table->string('pesan');
            $table->enum('jenis', ['Telepon', 'Web']);
            $table->enum('status', ['Booked','Finish', 'Cancel']);
            $table->timestamps();

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
        Schema::dropIfExists('booking');
    }
}
