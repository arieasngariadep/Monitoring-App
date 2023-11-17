<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomplainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komplain', function (Blueprint $table) {
            $table->id();
            $table->date('bulan')->nullable();
            $table->string('jumlah_sesuai', 20)->nullable();
            $table->string('persentase_sesuai', 20)->nullable();
            $table->string('jumlah_tidak_sesuai', 20)->nullable();
            $table->string('persentase_tidak_sesuai', 20)->nullable();
            $table->string('jumlah_komplain', 20)->nullable();
            $table->string('jenis_komplain', 20)->nullable();
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
        Schema::dropIfExists('komplain');
    }
}
