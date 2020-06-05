<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProdukmasuk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produkmasuk', function (Blueprint $table) {
            $table->id();
            $table->string('kode_produk');
            $table->integer('jumlah');
            $table->string('id_supplier');
            $table->date('tanggal_datang');
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
        Schema::dropIfExists('produkmasuk');
    }
}
