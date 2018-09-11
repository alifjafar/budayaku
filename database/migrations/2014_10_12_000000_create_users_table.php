<?php

use App\Model\User;
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
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedInteger('role_id');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('roles');
        });

        User::insert([
            [
                'username' => 'admin',
                'email'    => 'admin@farnetwork.net',
                'password' => bcrypt('budayaku2018'),
                'role_id'  => 1,
            ],
            [
                'username' => 'staff',
                'email'    => 'staff@farnetwork.net',
                'password' => bcrypt('budayaku2018'),
                'role_id'  => 2,
            ],
            [
                'username' => 'alifjafar',
                'email'    => 'alif@farnetwork.net',
                'password' => bcrypt('budayaku2018'),
                'role_id'  => 3,
            ],
            [
                'username' => 'rizky',
                'email'    => 'rizkyrhakiki21@gmail.com',
                'password' => bcrypt('budayaku2018'),
                'role_id'  => 4,
            ]
        ]);

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
