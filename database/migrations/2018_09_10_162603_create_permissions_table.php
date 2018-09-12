<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->unsignedInteger('role_id');
            $table->string('action');

            $table->primary(['role_id', 'action']);
            $table->foreign('role_id')->references('id')->on('roles');
        });

        \App\Model\Permission::insert([
            [
                'role_id' => 1,
                'action'  => 'admin'
            ],
            [
                'role_id' => 1,
                'action'  => 'manage'
            ],
            [
                'role_id' => 2,
                'action'  => 'manage'
            ],
            [
                'role_id' => 3,
                'action'  => 'manage_mitra'
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
        Schema::dropIfExists('permissions');
    }
}
