<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvailibilityEdcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('availibility_edc', function (Blueprint $table) {
            $table->id();
            $table->date('bulan')->nullable();
            $table->string('total_mid', 20)->nullable();
            $table->string('total_tid', 20)->nullable();
            $table->string('tid_tidak_trx', 20)->nullable();
            $table->string('tid_trx', 20)->nullable();
            $table->string('availability_bulan', 20)->nullable();
            $table->string('availability_ytd', 20)->nullable();
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
        Schema::dropIfExists('availibility_edc');
    }
}
