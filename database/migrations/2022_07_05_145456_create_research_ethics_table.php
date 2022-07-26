<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchEthicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_ethics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('research_id');
            $table->foreignId('research_type_id');
            $table->foreignId('origin_proposer_id');
            $table->foreignId('institution_proposer_id');
            $table->foreignId('status_proposer_id');
            $table->foreignId('research_fee_id')->nullable();

            $table->string('sumber_dana');
            $table->string('total_dana');

            $table->enum('kerjasama', ['bukan_kerjasama', 'nasional', 'internasional', 'peneliti_asing']);
            $table->integer('jumlah_negara')->nullable();
            $table->text('peneliti_asing')->nullable();

            $table->tinyInteger('is_multisenter')->default(0);
            $table->string('tempat_multisenter')->nullable();
            $table->tinyInteger('acc_multisenter')->nullable();

            $table->enum('status', ['propose', 'pay', 'accept'])->default('propose');
            $table->tinyInteger('paid')->default(0);
            
            $table->string('surat_pengantar');
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
        Schema::dropIfExists('research_ethics');
    }
}
