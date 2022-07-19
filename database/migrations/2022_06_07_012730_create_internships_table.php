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
            $table->foreignId('institution_id');

            $table->string('name');
            $table->string('nim', 100);
            $table->string('jurusan');
            $table->string('jenjang');
            $table->tinyInteger('semester');
            $table->text('address');

            $table->integer('province');
            $table->integer('city');
            
            $table->string('phone');

            $table->date('start_date');
            $table->date('end_date');
            $table->string('type');

            $table->string('jenjang_price')->default(0);
            $table->string('type_price')->default(0);
            $table->string('mou_price')->default(0);

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
