<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtmCrmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atm_crm', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->nullable();
            $table->string('pengelola_atm', 100)->nullable();
            $table->string('atmid', 100)->nullable();
            $table->string('lokasi', 100)->nullable();
            $table->string('kode_wil', 100)->nullable();
            $table->string('wilayah', 100)->nullable();
            $table->string('cabang', 100)->nullable();
            $table->string('jenis_atm', 100)->nullable();
            $table->string('service_level', 100)->nullable();
            $table->string('oos', 100)->nullable();
            $table->string('hardfault', 100)->nullable();
            $table->string('vandalism', 100)->nullable();
            $table->string('supplyout', 100)->nullable();
            $table->string('cashout', 100)->nullable();
            $table->string('comm', 100)->nullable();
            $table->string('reversal_usage', 100)->nullable();
            $table->string('reversal_amount', 100)->nullable();
            $table->string('withd_usage', 100)->nullable();
            $table->string('withd_amount', 100)->nullable();
            $table->string('deposit_usage', 100)->nullable();
            $table->string('deposit_amount', 100)->nullable();
            $table->string('transfer_usage', 100)->nullable();
            $table->string('transfer_amount', 100)->nullable();
            $table->string('payment_usage', 100)->nullable();
            $table->string('payment_amount', 100)->nullable();
            $table->string('inquiry_usage', 100)->nullable();
            $table->string('total', 100)->nullable();
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
        Schema::dropIfExists('atm_crm');
    }
}
