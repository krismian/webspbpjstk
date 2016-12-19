<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeritaGambar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berita_gambar', function(Blueprint $table)
        {
            $table->string('berita_id');
            $table->string('gambar_id');
        });
    }

    public function down()
    {
        Schema::drop('berita_gambar');
    }
}
