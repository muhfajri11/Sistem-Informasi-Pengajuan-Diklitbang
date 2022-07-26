<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumeReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resume_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('research_ethic_id')->constrained('research_ethics');
            $table->foreignId('user_id')->constrained('users');
            $table->longText('resume');
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
        Schema::dropIfExists('resume_reviews');
    }
}
