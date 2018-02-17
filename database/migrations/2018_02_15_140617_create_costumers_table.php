<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostumersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costumers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codeuser')->unsigned();
            $table->foreign('codeuser')->references('id')->on('users')->onDelete('cascade');
            $table->text('alamat');
            $table->string('email');
            $table->timestamps();
        });

        DB::table('costumers')->insert(
            array(                
                'codeuser' => '3',
                'alamat' => 'Alamat',
                'email' => 'email@email.com',             
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
        Schema::dropIfExists('costumers');
    }
}
