<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_produk_id')->references('id')->on('kategori_produk')->cascadeOnDelete();
            $table->string('nama_produk', 191);
            $table->enum('satuan', ['unit', 'set']);
            $table->string('warna', 191);
            $table->enum('berat_produk', ['kg', 'ton']);
            $table->longText('keterangan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
