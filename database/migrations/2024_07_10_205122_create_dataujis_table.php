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
        Schema::create('dataujis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_toko');
            $table->string('X1');
            $table->string('X2');
            $table->string('X3');
            $table->string('Y');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dataujis');
    }
};
