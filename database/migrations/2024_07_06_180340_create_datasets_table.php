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
        Schema::create('datasets', function (Blueprint $table) {
            $table->id();
            $table->string('nama_toko');
            $table->string('Y');
            $table->string('X1');
            $table->string('X2');
            $table->string('X3');
            $table->string('X4');
            $table->string('X1Y');
            $table->string('X2Y');
            $table->string('X3Y');
            $table->string('X4Y');
            $table->string('X1X2');
            $table->string('X1X3');
            $table->string('X1X4');
            $table->string('X2X3');
            $table->string('X2X4');
            $table->string('X3X4');
            $table->string('X1_square');
            $table->string('X2_square');
            $table->string('X3_square');
            $table->string('X4_square');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datasets');
    }
};
