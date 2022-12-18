<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_payroll', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payrol_id')->references('id')->on('perhitungan_payroll')->cascadeOnDelete();
            $table->foreignId('produk_id')->references('id')->on('produk')->cascadeOnDelete();
            $table->decimal('qty', 12, 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_payroll');
    }
}
