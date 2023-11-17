<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisputeResolutionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispute_resolution', function (Blueprint $table) {
            $table->id();
            $table->date('periode')->nullable();
            $table->string('total_case', 20)->nullable();
            $table->string('win_case', 20)->nullable();
            $table->string('target', 20)->nullable();
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
        Schema::dropIfExists('dispute_resolution');
    }
}
