<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_fees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('research_type_id');
            $table->foreignId('origin_proposer_id');
            $table->foreignId('institution_proposer_id');
            $table->foreignId('status_proposer_id');
            $table->foreignId('education_level_id');
            $table->string('fee');
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
        Schema::dropIfExists('research_fees');
    }
}
