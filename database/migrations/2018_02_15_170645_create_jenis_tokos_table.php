<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenisTokosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_tokos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('namajenis');
            $table->timestamps();
        });

        DB::table('jenis_tokos')->insert(
            array(                
                'namajenis' => 'Restoran',          
            )
        );

        DB::table('jenis_tokos')->insert(
            array(                
                'namajenis' => 'Stationery',          
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
        Schema::dropIfExists('jenis_tokos');
    }
}

