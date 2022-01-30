<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ComplaintsAddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('complaints', function (Blueprint $table) {
            $table->string('accused_party');
            $table->boolean('question_1');
            $table->boolean('question_2');
            $table->boolean('question_3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('complaints', function (Blueprint $table) {
            $table->dropColumn('accused_party');
            $table->dropColumn('question_1');
            $table->dropColumn('question_2');
            $table->dropColumn('question_3');
        });
    }
}
