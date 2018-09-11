<?php

use App\Model\UserProfile;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('name');
            $table->tinyInteger('gender')->comment('1. Laki-Laki, 2. Perempuan');
            $table->string('telp');
            $table->longText('address');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        UserProfile::insert([
            'user_id'   => 1,
            'name'      => 'Super Admin',
            'gender'    => 1,
            'telp'      => '08123412312',
            'address'   => 'Jl. Telekomunikasi No. 1 Bandung Jawa Barat'
        ],
        [
            'user_id'   => 2,
            'name'      => 'Staff Budayaku',
            'gender'    => 2,
            'telp'      => '08123412312',
            'address'   => 'Jl. Telekomunikasi No. 1 Bandung Jawa Barat'
        ],
        [
            'user_id'   => 3,
            'name'      => 'Alif Jafar',
            'gender'    => 1,
            'telp'      => '08123412312',
            'address'   => 'Jl. Telekomunikasi No. 1 Bandung Jawa Barat'
        ],
        [
            'user_id'   => 4,
            'name'      => 'Rizky Rahmat Hakiki',
            'gender'    => 1,
            'telp'      => '08123412312',
            'address'   => 'Jl. Telekomunikasi No. 1 Bandung Jawa Barat'
        ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_profiles');
    }
}
