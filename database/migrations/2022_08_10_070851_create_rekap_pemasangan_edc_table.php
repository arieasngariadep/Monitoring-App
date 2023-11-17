<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekapPemasanganEdcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekap_pemasangan_edc', function (Blueprint $table) {
            $table->id();
            $table->string('wilayah', 20)->nullable();
            $table->string('new_merchant', 20)->nullable();
            $table->string('edc_terpasang', 20)->nullable();
            $table->string('persentase_edc_terpasang', 20)->nullable();
            $table->string('belum_pasang_sudah_spk', 20)->nullable();
            $table->string('belum_pasang_belum_spk', 20)->nullable();
            $table->string('persentase_belum_terpasang', 20)->nullable();
            $table->string('failed', 20)->nullable();
            $table->string('pending', 20)->nullable();
            $table->string('persentase_gagal_pasang', 20)->nullable();
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
        Schema::dropIfExists('rekap_pemasangan_edc');
    }
}
