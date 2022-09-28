<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('sinopsis');
            $table->string('background');
            $table->string('cover');
            $table->integer('durasi');
            $table->unsignedBigInteger('id_tahun_rilis');
            $table->unsignedBigInteger('id_genre');

            // relasi
            // fk id_tahun_rilis
            $table->foreign('id_tahun_rilis')->references('id')->on('tahun_rilis');
            $table->foreign('id_genre')->references('id')->on('genres');

            $table->timestamps();
        });

        Schema::create('casting_movies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_casting');
            $table->unsignedBigInteger('id_movie');

            $table->foreign('id_casting')->references('id')->on('castings')
            ->on('castings')->onDelete('cascade');;
            $table->foreign('id_movie')->references('id')->on('movies')
            ->on('movies')->onDelete('cascade');;
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
        Schema::dropIfExists('casting_movies');
        Schema::dropIfExists('movies');
    }
};
