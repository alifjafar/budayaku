<?php

use App\Model\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });

        Category::insert([
            [
                'name' => 'Seni Wayang',
                'slug' => 'seni-wayang',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Seni Tari',
                'slug' => 'seni-tari',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Seni Opera',
                'slug' => 'seni-opera',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Seni Drama',
                'slug' => 'seni-drama',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Seni Teater',
                'slug' => 'seni-teater',
                'created_at' => \Carbon\Carbon::now()
            ],

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
