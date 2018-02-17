<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kodetransaksi');
            $table->integer('kodecostumer')->unsigned();
            $table->foreign('kodecostumer')->references('codeuser')->on('costumers')->onDelete('cascade');
            $table->integer('kodesupplier')->unsigned();
            $table->foreign('kodesupplier')->references('codeuser')->on('suppliers')->onDelete('cascade');
            $table->string('kodeproduk');
            $table->integer('jumlahpembelian');
            $table->integer('totalharga');
            $table->string('status')->default('FALSE');
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
        Schema::dropIfExists('transaksis');
    }
}
