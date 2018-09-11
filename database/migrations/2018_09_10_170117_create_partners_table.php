<?php

use App\Model\Partner;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('name');
            $table->string('slug');
            $table->longText('description');
            $table->longText('address');
            $table->string('id_card');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Partner::insert([
            'user_id' => 3,
            'name'  => 'Sanggar Pari Purna - Bali',
            'slug'  => 'pari-purna-bali',
            'description' => 'Sanggar Paripurna didirikan pada tanggal 1 April 1990 oleh seniman multi 
                talenta asal Desa Bona, Kecamatan Blahbatuh, I Made Sidja, tersebut mencakup berbagai bidang kesenian, 
                seperti seni pedalangan, seni wayang, seni tabuh, seni tari, seni pertunjukan, seni ukir kulit, seni 
                membuat sesajen, dan yang lainnya. Pendirian Sanggar Paripurna dimaksudkan sebagai pusat pelestarian, 
                pengembangan dan penciptaan seni budaya Bali. Sanggar ini terutama menampung dan mengasah bakat seni anak-anak putus 
                sekolah atau mereka yang sudah tamat sekolah tetapi belum bekerja.',
            'address' => 'Jl. Telekomunikasi No. 1 Bandung Jawa Barat',
            'id_card' => 'default.png'

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partners');
    }
}
