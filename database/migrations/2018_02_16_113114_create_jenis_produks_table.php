<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenisProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_produks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jenistoko')->unsigned();
            $table->foreign('jenistoko')->references('id')->on('jenis_tokos')->onDelete('cascade');
            $table->string('type');
            $table->timestamps();
        });

        DB::table('jenis_produks')->insert(
            array(                
                'jenistoko' => '1',
                'type' => 'Makanan',          
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
        Schema::dropIfExists('jenis_produks');
    }
}
