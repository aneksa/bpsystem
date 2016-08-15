<?php

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
            $table->increments('id_User');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nip_User')->unique();
            $table->integer('level_User');
            $table->string('avatar');
            $table->rememberToken();
            $table->timestamps();
        });
        $now = new DateTime;
        DB::table('users')->insert(['name'=>'Andy Eka Saputra', 'email'=>'andyeka07@gmail.com', 'password'=>'123123', 'nip_User'=>'123123', 'level_User'=>'1', 'avatar'=>'anonymous.jpg', 'created_at'=>$now, 'updated_at'=>$now]);
        DB::table('users')->insert(['name'=>'Alvian', 'email'=>'alvian@gmail.com', 'password'=>'123123', 'nip_User'=>'111111', 'level_User'=>'2', 'avatar'=>'anonymous.jpg', 'created_at'=>$now, 'updated_at'=>$now]);
        DB::table('users')->insert(['name'=>'Hengky', 'email'=>'hengky@gmail.com', 'password'=>'123123', 'nip_User'=>'222222', 'level_User'=>'2', 'avatar'=>'anonysmous.jpg', 'created_at'=>$now, 'updated_at'=>$now]);
        DB::table('users')->insert(['name'=>'Kamal', 'email'=>'kamal@gmail.com', 'password'=>'123123', 'nip_User'=>'333333', 'level_User'=>'2', 'avatar'=>'anonymous.jpg', 'created_at'=>$now, 'updated_at'=>$now]);
        DB::table('users')->insert(['name'=>'Eka', 'email'=>'eka@gmail.com', 'password'=>'123123', 'nip_User'=>'444444', 'level_User'=>'2', 'avatar'=>'anonymous.jpg', 'created_at'=>$now, 'updated_at'=>$now]);
        DB::table('users')->insert(['name'=>'Supriadi', 'email'=>'Supriadi@gmail.com', 'password'=>'123123', 'nip_User'=>'555555', 'level_User'=>'2', 'avatar'=>'anonymous.jpg', 'created_at'=>$now, 'updated_at'=>$now]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
