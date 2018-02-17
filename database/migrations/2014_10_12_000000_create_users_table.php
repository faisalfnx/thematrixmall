<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('role')->null();
            $table->string('approved')->null();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(
            array(            
                'id' => '1',    
                'name' => 'Admin',
                'username' => '4dm1n',
                'password' => bcrypt('admin'),
                'role' => '1', 
                'approved' => '',     
            )
        );

        DB::table('users')->insert(
            array(       
                'id' => '2',         
                'name' => 'Supplier',
                'username' => 'suppl13r',
                'password' => bcrypt('supplier'),
                'role' => '2',  
                'approved' => '2',              
            )
        );

        DB::table('users')->insert(
            array(       
                'id' => '4',         
                'name' => 'Supplier2',
                'username' => 'suppl13r2',
                'password' => bcrypt('supplier'),
                'role' => '2',  
                'approved' => '2',              
            )
        );

        DB::table('users')->insert(
            array(       
                'id' => '5',         
                'name' => 'Supplier3',
                'username' => 'suppl13r3',
                'password' => bcrypt('supplier'),
                'role' => '2',  
                'approved' => '2',              
            )
        );

        DB::table('users')->insert(
            array(      
                'id' => '3',          
                'name' => 'Costumer',
                'username' => 'c0stum3r',
                'password' => bcrypt('costumer'),
                'role' => '3',    
                'approved' => '2',          
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
        Schema::dropIfExists('users');
    }
}
