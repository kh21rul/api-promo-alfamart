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
        Schema::create('roishops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')->constrained(
                table: 'shops',
                indexName: 'roishops_shop_id'
            );
            $table->string('tahun');
            $table->string('laba_bersih');
            $table->string('total_aktiva');
            $table->string('roi');
            $table->string('kondisi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roishops');
    }
};
