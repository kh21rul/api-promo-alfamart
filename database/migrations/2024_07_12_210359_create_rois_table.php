<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rois', function (Blueprint $table) {
            $table->id();
            $table->string('tahun');
            $table->string('laba_bersih');
            $table->string('total_aktiva');
            $table->string('roi');
            $table->string('standart_industri');
            $table->string('kondisi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rois');
    }
};
