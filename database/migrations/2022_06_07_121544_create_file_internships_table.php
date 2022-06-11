<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileInternshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_internships', function (Blueprint $table) {
            $table->id();
            $table->string('proposal');
            $table->string('akreditasi');
            $table->string('panduan_praktek');
            $table->string('ktm');
            $table->string('transkrip');
            $table->string('izin_pkl');
            $table->string('izin_ortu');
            $table->string('antigen');
            $table->string('mou')->nullable();
            $table->string('bukti_pkl')->nullable();
            $table->string('eviden_paid')->nullable();
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
        Schema::dropIfExists('file_internships');
    }
}
