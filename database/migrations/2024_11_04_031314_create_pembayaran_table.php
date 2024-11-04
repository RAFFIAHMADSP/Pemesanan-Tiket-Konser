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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->integer('id_pembayaran')->primary()->autoIncrement();


            $table->integer('id_pemesanan');
            $table->foreign('id_pemesanan')
                  ->references('id_pemesanan')
                  ->on('pemesanan')
                  ->onDelete('cascade') // Relasi ke pemesanan
                  ->onUpdate('cascade'); // Relasi ke pemesanan

            $table->decimal('amount', 10, 2); // Jumlah yang dibayarkan
            $table->dateTime('payment_date'); // Waktu pembayaran
            $table->enum('status', ['pending', 'completed', 'failed']); // Status pembayaran
            $table->string('method')->nullable(); // Metode pembayaran (misal: kartu, transfer bank, dll)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
