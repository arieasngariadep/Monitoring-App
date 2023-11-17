<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaguKasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagu_kas', function (Blueprint $table) {
            $table->id();
            $table->date('bulan')->nullable();
            $table->string('realisasi', 100)->nullable();
            $table->string('pagu_kas', 100)->nullable();
            $table->string('persentase_bulan', 20)->nullable();
            $table->string('persentase_ytd', 20)->nullable();
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
        Schema::dropIfExists('pagu_kas');
    }
}
