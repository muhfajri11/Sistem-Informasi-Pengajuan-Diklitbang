<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('institution_id');
            $table->foreignId('education_level_id');
            
            $table->string('judul');
            $table->string('title');
            $table->enum('tipe_penelitian', ['kesehatan', 'umum']);

            $table->string('ketua');
            $table->string('nik', 100);
            $table->string('phone');
            $table->text('address');
            $table->integer('province');
            $table->integer('city');

            $table->text('anggota');

            $table->string('tempat');
            $table->date('start_date');
            $table->date('end_date');
            $table->tinyInteger('is_layaketik')->nullable();
            
            $table->enum('status', ['reject', 'review', 'pay', 'accept'])->default('review');
            $table->tinyInteger('paid')->default(0);
            $table->string('total_paid');

            $table->string('proposal');
            $table->string('permohonan');
            
            $table->string('izin_penelitian')->nullable();
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
        Schema::dropIfExists('research');
    }
}
