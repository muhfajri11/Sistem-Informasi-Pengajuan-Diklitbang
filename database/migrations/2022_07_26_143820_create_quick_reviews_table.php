<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuickReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quick_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('research_ethic_id')->constrained('research_ethics');
            $table->foreignId('user_id')->constrained('users');
            $table->text('nilai_sosial')->nullable();
            $table->text('catatan_nilaisosial')->nullable();
            $table->text('nilai_ilmiah')->nullable();
            $table->text('catatan_nilaiilmiah')->nullable();
            $table->text('pemerataan')->nullable();
            $table->text('catatan_pemerataan')->nullable();
            $table->text('potensi')->nullable();
            $table->text('catatan_potensi')->nullable();
            $table->text('bujukan')->nullable();
            $table->text('catatan_bujukan')->nullable();
            $table->text('privacy')->nullable();
            $table->text('catatan_privacy')->nullable();
            $table->text('informed_consent')->nullable();
            $table->text('catatan_informedconsent')->nullable();
            $table->enum('status', ['exempted', 'expedited', 'fullboard', 'ditolak']);
            $table->text('kesimpulan')->nullable();
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
        Schema::dropIfExists('quick_reviews');
    }
}
