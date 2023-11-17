<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekonRjiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekon_rji', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->nullable();
            $table->string('jenis_rekon',50)->nullable();
            $table->integer('item_trx')->nullable();
            $table->bigInteger('nominal')->nullable();
            $table->integer('item_trx_match')->nullable();
            $table->bigInteger('nominal_trx_match')->nullable();
            $table->integer('item_trx_unmatch')->nullable();
            $table->bigInteger('nominal_trx_unmatch')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekon_rji');
    }
}
