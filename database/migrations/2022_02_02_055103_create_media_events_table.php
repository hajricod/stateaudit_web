<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_events', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('title_en', 255);
            $table->string('description', 1000)->nullable();
            $table->string('description_en', 1000)->nullable();
            $table->boolean('allday')->default(true);
            $table->dateTime('start_on');
            $table->dateTime('end_on');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media_events');
    }
}
