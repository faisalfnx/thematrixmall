<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codeuser')->unsigned();
            $table->foreign('codeuser')->references('id')->on('users')->onDelete('cascade');
            $table->string('namatoko');
            $table->text('alamat');
            $table->string('email');
            $table->integer('jenistoko');
            $table->text('slogantoko');
            $table->text('sampultoko');
            $table->timestamps();
        });

        DB::table('suppliers')->insert(
            array(                
                'codeuser' => '2',
                'namatoko' => 'Panda Sakti',
                'alamat' => 'Jln . Jatinegara Barat , Jakarta Timur',
                'email' => 'pandasakti@gmail.com',
                'jenistoko' => '1',
                'slogantoko' => 'Murah , Aman , Dan Terpercaya',
                'sampultoko' => '201802151916395a85dc97651fd.png',               
            )
        );

        DB::table('suppliers')->insert(
            array(                
                'codeuser' => '4',
                'namatoko' => 'Panda Keren',
                'alamat' => 'Jln . Jatinegara Timur , Jakarta Timur',
                'email' => 'pandakeren@gmail.com',
                'jenistoko' => '1',
                'slogantoko' => 'Murah , Aman , Dan Terpercaya',
                'sampultoko' => '201802151916395a85dc97651fd.png',               
            )
        );

        DB::table('suppliers')->insert(
            array(                
                'codeuser' => '5',
                'namatoko' => 'Panda Imur',
                'alamat' => 'Jln . Jatinegara Timur , Jakarta Timur',
                'email' => 'pandaimur@gmail.com',
                'jenistoko' => '2',
                'slogantoko' => 'Murah , Aman , Dan Terpercaya',
                'sampultoko' => '201802151916395a85dc97651fd.png',               
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
        Schema::dropIfExists('suppliers');
    }
}
