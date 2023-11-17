<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oos', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->nullable();
            $table->string('00:00', 20)->nullable();
            $table->string('02:00', 20)->nullable();
            $table->string('04:00', 20)->nullable();
            $table->string('05:00', 20)->nullable();
            $table->string('05:30', 20)->nullable();
            $table->string('06:00', 20)->nullable();
            $table->string('06:30', 20)->nullable();
            $table->string('07:00', 20)->nullable();
            $table->string('07:30', 20)->nullable();
            $table->string('08:00', 20)->nullable();
            $table->string('08:30', 20)->nullable();
            $table->string('09:00', 20)->nullable();
            $table->string('09:30', 20)->nullable();
            $table->string('10:00', 20)->nullable();
            $table->string('10:30', 20)->nullable();
            $table->string('11:00', 20)->nullable();
            $table->string('11:30', 20)->nullable();
            $table->string('12:00', 20)->nullable();
            $table->string('12:30', 20)->nullable();
            $table->string('13:00', 20)->nullable();
            $table->string('13:30', 20)->nullable();
            $table->string('14:00', 20)->nullable();
            $table->string('14:30', 20)->nullable();
            $table->string('15:00', 20)->nullable();
            $table->string('15:30', 20)->nullable();
            $table->string('16:00', 20)->nullable();
            $table->string('16:30', 20)->nullable();
            $table->string('17:00', 20)->nullable();
            $table->string('17:30', 20)->nullable();
            $table->string('18:00', 20)->nullable();
            $table->string('18:30', 20)->nullable();
            $table->string('19:00', 20)->nullable();
            $table->string('19:30', 20)->nullable();
            $table->string('20:00', 20)->nullable();
            $table->string('20:30', 20)->nullable();
            $table->string('21:00', 20)->nullable();
            $table->string('21:30', 20)->nullable();
            $table->string('22:00', 20)->nullable();
            $table->string('avg', 20)->nullable();
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
        Schema::dropIfExists('oos');
    }
}
