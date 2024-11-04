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
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->integer('id_pemesanan')->primary()->autoIncrement();

            $table->integer('id_pengguna');
            $table->foreign('id_pengguna')
               ->references('id_pengguna')
                  ->on('pengguna')
                  ->onDelete('cascade') // Relasi ke pengguna
                  ->onUpdate('cascade'); // Relasi ke pengguna

            $table->integer('id_konser');
            $table->foreign('id_konser')
                  ->references('id_konser')
                  ->on('konser')
                  ->onDelete('cascade') // Relasi ke konser
                  ->onUpdate('cascade'); // Relasi ke konser

            $table->integer('ticket_qty')->unsigned(); // Jumlah tiket yang dipesan
            $table->decimal('total_price', 10, 2); // Total harga yang harus dibayar
            $table->enum('payment_status', ['pending', 'completed', 'failed']); // Status pembayaran
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan');
    }
};
