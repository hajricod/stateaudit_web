<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeaderSublinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header_sublinks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('header_links_id');
            $table->integer('sort')->nullable();
            $table->string('title');
            $table->string('title_en');
            $table->string('url')->default('#');
            $table->timestamps();

            $table->foreign('header_links_id')->references('id')->on('header_links');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('header_sublinks');
    }
}
