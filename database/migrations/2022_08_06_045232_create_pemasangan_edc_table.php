<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemasanganEdcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemasangan_edc', function (Blueprint $table) {
            $table->id();
            $table->date('bulan')->nullable();
            $table->string('total', 20)->nullable();
            $table->string('sesuai_sla', 20)->nullable();
            $table->string('persentase', 20)->nullable();
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
        Schema::dropIfExists('pemasangan_edc');
    }
}
