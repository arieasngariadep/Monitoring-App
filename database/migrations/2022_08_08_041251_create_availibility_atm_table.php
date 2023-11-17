<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvailibilityAtmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('availibility_atm', function (Blueprint $table) {
            $table->id();
            $table->date('bulan')->nullable();
            $table->string('rata_event_problem', 20)->nullable();
            $table->string('durasi_bulan', 20)->nullable();
            $table->string('durasi_ytd', 20)->nullable();
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
        Schema::dropIfExists('availibility_atm');
    }
}
