<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSampahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Tabel ini sudah dibuat oleh dump we-cycle.sql, tapi tercatat di tabel
        // migrations dengan timestamp lain (173275), sehingga migration ini terbaca
        // sebagai belum jalan. Tanpa penjagaan ini "php artisan migrate" gagal pada
        // instalasi baru yang mengimpor dump tersebut.
        if (Schema::hasTable('sampah')) {
            return;
        }

        Schema::create('sampah', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->unsigned()->index()->nullable();
            $table->foreign('category_id')->references('id')->on('sampah_categories')
                ->onDelete('cascade');
            $table->string('name');
            $table->string('image');
            $table->integer('price_per_kg');
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
        Schema::dropIfExists('sampah');
    }
}
