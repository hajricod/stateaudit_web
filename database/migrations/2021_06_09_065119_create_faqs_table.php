<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('faq_group_id');
            $table->integer('rank');
            $table->text("question", 500);
            $table->text("question_en", 500)->nullable();
            $table->text("answer");
            $table->text("answer_en")->nullable();
            $table->timestamps();

            $table->foreign('faq_group_id')->references('id')->on('faq_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faqs');
    }
}
