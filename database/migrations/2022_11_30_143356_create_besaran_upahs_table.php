<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBesaranUpahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('besaran_upah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_id')->references('id')->on('produk')->cascadeOnDelete();
            $table->decimal('besaran_upah', 12, 0);
            $table->string('keterangan', 191)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('besaran_upah');
    }
}
