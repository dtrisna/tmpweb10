<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
    Schema::create('menu_kopi', function (Blueprint $table) {
    $table->id();
    $table->string('nama');
    $table->integer('harga');
    $table->string('kategori')->nullable();
    $table->boolean('tersedia')->default(true);
    $table->timestamps();
});
    }


    public function down(): void
    {
        Schema::dropIfExists('menu_kopi');
    }
};
