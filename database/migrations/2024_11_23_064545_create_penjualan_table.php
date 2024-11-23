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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id(); //id otomatis auto increment
            $table->string('id_barang',12)->nullable(); //type data varchar
            $table->string('nama_barang',100)->nullable(); //type data varchar
            $table->string('jenis_barang',10)->nullable(); //type data varchar
            $table->string('harga_barang',30)->nullable(); //type data varchar
            $table->timestamps(); //otomatis dibuatkan kolom create_time dan update_time
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table');
    }
};
