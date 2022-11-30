<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('isbn')->unique();
            $table->string('judul');
            $table->text('sinopsis');
            $table->string('penerbit');
            $table->string('cover');
            $table->foreignId('kategori_id')->constrained('kategori')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->string('status')->default('Tidak Aktif');
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
        Schema::dropIfExists('buku');
    }
};
