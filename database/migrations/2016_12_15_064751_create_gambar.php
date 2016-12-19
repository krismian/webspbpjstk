<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGambar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gambar', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('image_path');
            $table->string('image_path_thumb');
            $table->string('filename');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('gambar');
    }
}
