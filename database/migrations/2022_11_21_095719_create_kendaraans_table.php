<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKendaraansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_keluaran');
            $table->string('warna');
            $table->string('harga');
            $table->string('jenis_kendaraan');
            $table->string('stok');
            $table->string('status');
            $table->foreignId('id_kendaraan_motor')->nullable()->constrained('motors');
            $table->foreignId('id_kendaraan_mobil')->nullable()->constrained('mobils');
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
        Schema::dropIfExists('kendaraans');
    }
}
