<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('file_internship_id')->nullable();
            $table->foreignId('institution_id');

            $table->string('name');
            $table->string('nim', 100);
            $table->string('jurusan');
            $table->tinyInteger('semester');
            $table->text('address');

            $table->integer('province');
            $table->integer('city');
            
            $table->string('phone');

            $table->date('start_date');
            $table->date('end_date');
            $table->enum('type', ['non-medic', 'medic']);

            $table->enum('status', ['reject', 'review', 'pay', 'accept', 'done'])->default('review');
            $table->tinyInteger('paid')->default(0);
            $table->string('total_paid');

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
        Schema::dropIfExists('internships');
    }
}
