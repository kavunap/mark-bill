<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveDescription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('hours');
            $table->dropColumn('credits');
        });
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('st_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->text('description');
            $table->integer('credits');
            $table->integer('hours');
        });
        Schema::table('students', function (Blueprint $table) {
            $table->string('st_code');
        });
    }
}
