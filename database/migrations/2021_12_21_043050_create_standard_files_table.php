<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStandardFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standard_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('standard_folder_id')->nullable();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('file_name');
            $table->string('type');
            $table->string('path');
            $table->string('size');
            $table->timestamps();
        
            $table->foreign('standard_folder_id')->references('id')->on('standard_folders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('standard_files');
    }
}
