<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kodeproduk');
            $table->integer('kodesupplier')->unsigned();
            $table->foreign('kodesupplier')->references('codeuser')->on('suppliers')->onDelete('cascade');
            $table->string('jenisproduk');
            $table->string('namaproduk');
            $table->integer('hargaproduk');
            $table->integer('stok');
            $table->string('status');
            $table->timestamps();
        });

        DB::table('produks')->insert(
            array(                
                'kodeproduk' => '100001',
                'kodesupplier' => '2',
                'jenisproduk' => 'Coklat',
                'namaproduk' => 'Choki - Choki',
                'hargaproduk' => '1000',
                'stok' => '100' ,
                'status' => 'TRUE'         
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
}
