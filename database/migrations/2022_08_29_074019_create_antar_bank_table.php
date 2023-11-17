<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntarBankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antar_bank', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->nullable();
            $table->string('hak_trx_wd_link', 100)->nullable();
            $table->string('hak_amount_wd_link', 100)->nullable();
            $table->string('hak_trx_wd_mp', 100)->nullable();
            $table->string('hak_amount_wd_mp', 100)->nullable();
            $table->string('hak_trx_wd_prima', 100)->nullable();
            $table->string('hak_amount_wd_prima', 100)->nullable();
            $table->string('hak_trx_wd_bersama', 100)->nullable();
            $table->string('hak_amount_wd_bersama', 100)->nullable();
            $table->string('hak_trx_wd_alto', 100)->nullable();
            $table->string('hak_amount_wd_alto', 100)->nullable();
            $table->string('total_hak_trx_wd', 100)->nullable();
            $table->string('total_hak_amount_wd', 100)->nullable();
            $table->string('hak_trx_trf_link', 100)->nullable();
            $table->string('hak_amount_trf_link', 100)->nullable();
            $table->string('hak_trx_trf_mp', 100)->nullable();
            $table->string('hak_amount_trf_mp', 100)->nullable();
            $table->string('hak_trx_trf_prima', 100)->nullable();
            $table->string('hak_amount_trf_prima', 100)->nullable();
            $table->string('hak_trx_trf_bersama', 100)->nullable();
            $table->string('hak_amount_trf_bersama', 100)->nullable();
            $table->string('hak_trx_trf_alto', 100)->nullable();
            $table->string('hak_amount_trf_alto', 100)->nullable();
            $table->string('total_hak_trx_trf', 100)->nullable();
            $table->string('total_hak_amount_trf', 100)->nullable();           
            $table->string('kwj_trx_wd_link', 100)->nullable();
            $table->string('kwj_amount_wd_link', 100)->nullable();
            $table->string('kwj_trx_wd_mp', 100)->nullable();
            $table->string('kwj_amount_wd_mp', 100)->nullable();
            $table->string('kwj_trx_wd_prima', 100)->nullable();
            $table->string('kwj_amount_wd_prima', 100)->nullable();
            $table->string('kwj_trx_wd_bersama', 100)->nullable();
            $table->string('kwj_amount_wd_bersama', 100)->nullable();
            $table->string('kwj_trx_wd_alto', 100)->nullable();
            $table->string('kwj_amount_wd_alto', 100)->nullable();
            $table->string('total_kwj_trx_wd', 100)->nullable();
            $table->string('total_kwj_amount_wd', 100)->nullable();
            $table->string('kwj_trx_trf_link', 100)->nullable();
            $table->string('kwj_amount_trf_link', 100)->nullable();
            $table->string('kwj_trx_trf_mp', 100)->nullable();
            $table->string('kwj_amount_trf_mp', 100)->nullable();
            $table->string('kwj_trx_trf_prima', 100)->nullable();
            $table->string('kwj_amount_trf_prima', 100)->nullable();
            $table->string('kwj_trx_trf_bersama', 100)->nullable();
            $table->string('kwj_amount_trf_bersama', 100)->nullable();
            $table->string('kwj_trx_trf_alto', 100)->nullable();
            $table->string('kwj_amount_trf_alto', 100)->nullable();
            $table->string('total_kwj_trx_trf', 100)->nullable();
            $table->string('total_kwj_amount_trf', 100)->nullable();
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
        Schema::dropIfExists('antar_bank');
    }
}
