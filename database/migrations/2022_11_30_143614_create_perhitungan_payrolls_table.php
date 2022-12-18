<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerhitunganPayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perhitungan_payroll', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_produksi');
            $table->foreignId('karyawan_id')->references('id')->on('users')->cascadeOnDelete();
            $table->decimal('total', 12, 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perhitungan_payroll');
    }
}
