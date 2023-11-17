<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekonsiliasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekonsiliasi', function (Blueprint $table) {
            $table->id();
            $table->date('bulan')->nullable();
            $table->string('item_switcher', 20)->nullable();
            $table->string('sesuai_sla_switcher', 20)->nullable();
            $table->string('persentase_switcher', 20)->nullable();
            $table->string('item_principal', 20)->nullable();
            $table->string('sesuai_sla_principal', 20)->nullable();
            $table->string('persentase_principal', 20)->nullable();
            $table->string('item_biller', 20)->nullable();
            $table->string('sesuai_sla_biller', 20)->nullable();
            $table->string('persentase_biller', 20)->nullable();
            $table->string('item_merchant', 20)->nullable();
            $table->string('sesuai_sla_merchant', 20)->nullable();
            $table->string('persentase_merchant', 20)->nullable();
            $table->string('item_private_label', 20)->nullable();
            $table->string('sesuai_sla_private_label', 20)->nullable();
            $table->string('persentase_private_label', 20)->nullable();
            $table->string('item_bansos', 20)->nullable();
            $table->string('sesuai_sla_bansos', 20)->nullable();
            $table->string('persentase_bansos', 20)->nullable();
            $table->string('total_item_channel', 20)->nullable();
            $table->string('sesuai_sla_channel', 20)->nullable();
            $table->string('persentase_channel', 20)->nullable();
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
        Schema::dropIfExists('rekonsiliasi');
    }
}
