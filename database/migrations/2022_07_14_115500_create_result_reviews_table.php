<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('research_ethic_id')->constrained('research_ethics');
            $table->enum('status', ['exempted', 'expedited', 'fullboard', 'ditolak']);
            $table->integer('revision');
            $table->text('keterangan');
            $table->string('sertifikat_layaketik')->nullable();
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
        Schema::dropIfExists('result_reviews');
    }
}
