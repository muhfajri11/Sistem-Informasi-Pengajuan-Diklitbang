<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisionProtocolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revision_protocols', function (Blueprint $table) {
            $table->id();
            $table->foreignId('protocol_id')->constrained('protocols');
            $table->integer('revision');
            $table->tinyInteger('is_ready')->default(0);
            $table->longText('ringkasan_protokol');
            $table->longText('isu_etik');
            $table->longText('ringkasan_kajianpustaka')->nullable();
            $table->longText('kondisi_lapangan')->nullable();
            $table->longText('disain_penelitian')->nullable();
            $table->longText('sampling')->nullable();
            $table->longText('intervensi')->nullable();
            $table->longText('monitoring_penelitian')->nullable();
            $table->longText('penghentian_penelitian')->nullable();
            $table->longText('adverse_penelitian')->nullable();
            $table->longText('penanganan_komplikasi')->nullable();
            $table->longText('manfaat')->nullable();
            $table->longText('keberlanjutan_manfaat')->nullable();
            $table->longText('informed_consent')->nullable();
            $table->longText('wali')->nullable();
            $table->longText('bujukan')->nullable();
            $table->longText('penjagaan_kerahasiaan')->nullable();
            $table->longText('rencana_analisis')->nullable();
            $table->longText('monitor_keamanan')->nullable();
            $table->longText('konflik_keamanan')->nullable();
            $table->longText('manfaat_sosial')->nullable();
            $table->longText('hakatas_data')->nullable();
            $table->longText('publikasi')->nullable();
            $table->longText('pendanaan')->nullable();
            $table->longText('komitmen_etik')->nullable();
            $table->longText('daftar_pustaka')->nullable();
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
        Schema::dropIfExists('revision_protocols');
    }
}
