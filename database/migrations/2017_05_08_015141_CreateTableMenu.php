<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('idMenu');
            $table->string('namaMenu', 25);
            $table->string('deskMenu', 200);
            $table->decimal('rating', 10,1);
            $table->integer('harga');
            $table->string('gambar')->nullable();
            $table->integer('idKategori')->unsigned();
            $table->timestamps();

            $table->foreign('idKategori')->references('idKategori')->on('kategori')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
}
