<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComparativeRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comparative_room', function (Blueprint $table) {
            $table->foreignId('comparative_id')->constrained('comparatives');
            $table->foreignId('room_id')->constrained('rooms');
            $table->primary(['comparative_id', 'room_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comparative_room');
    }
}
