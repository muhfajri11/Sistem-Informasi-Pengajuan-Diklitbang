<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelfAssesmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('self_assesments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('research_ethic_id')->constrained('research_ethics');
            $table->text('nilai_sosial');
            $table->text('catatan_nilaisosial');
            $table->text('nilai_ilmiah');
            $table->text('catatan_nilaiilmiah');
            $table->text('pemerataan');
            $table->text('catatan_pemerataan');
            $table->text('potensi');
            $table->text('catatan_potensi');
            $table->text('bujukan');
            $table->text('catatan_bujukan');
            $table->text('privacy');
            $table->text('catatan_privacy');
            $table->text('informed_consent');
            $table->text('catatan_informedconsent');
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
        Schema::dropIfExists('self_assesments');
    }
}
