<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPointPerKgToSampahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sampah', function (Blueprint $table) {
            $table->integer('point_per_kg')->default(0)->after('price_per_kg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sampah', function (Blueprint $table) {
            $table->dropColumn('point_per_kg');
        });
    }
}
