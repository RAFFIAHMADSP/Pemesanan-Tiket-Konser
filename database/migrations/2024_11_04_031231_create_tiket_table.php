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
        Schema::create('tiket', function (Blueprint $table) {
            $table->integer('id_tiket')->primary()->autoIncrement();

            $table->integer('id_pemesanan');
            $table->foreign('id_pemesanan')
                  ->references('id_pemesanan')
                  ->on('pemesanan')
                  ->onDelete('cascade') // Relasi ke pemesanan
                  ->onUpdate('cascade'); // Relasi ke pemesanan

            $table->string('ticket_code', 50)->unique(); // Kode tiket unik
            $table->enum('ticket_status', ['valid', 'used', 'cancelled']); // Status tiket
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiket');
    }
};
