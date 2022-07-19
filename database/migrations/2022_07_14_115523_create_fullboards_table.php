<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFullboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fullboards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('research_ethic_id')->constrained('research_ethics');
            $table->string('tanggal');
            $table->string('jam');
            $table->string('tempat');
            $table->string('surat_pemberitahuan');
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
        Schema::dropIfExists('fullboards');
    }
}
