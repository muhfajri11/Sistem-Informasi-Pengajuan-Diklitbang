<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComparativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comparatives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('institution_id');

            $table->string('title');
            $table->text('questions');
            $table->integer('members');
            $table->date('visit');
            $table->enum('status', ['review', 'pay', 'accept']);
            
            $table->string('total_paid');
            $table->integer('paid');
            $table->string('eviden_paid')->nullable();
            $table->string('attach');

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
        Schema::dropIfExists('comparatives');
    }
}
