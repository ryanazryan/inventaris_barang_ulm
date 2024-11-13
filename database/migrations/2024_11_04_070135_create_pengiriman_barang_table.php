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
        Schema::create('pengiriman_barang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id')->constrained('barang')->onDelete('cascade');
            $table->foreignId('ruangan_pengirim_id')->constrained('ruangan')->onDelete('cascade'); 
            $table->foreignId('ruangan_penerima_id')->constrained('ruangan')->onDelete('cascade'); 
            $table->integer('jumlah'); 
            $table->timestamp('tanggal')->useCurrent();
            $table->enum('status', ['Pending', 'Diterima'])->default('Pending'); 
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengiriman_barang');
    }
};
