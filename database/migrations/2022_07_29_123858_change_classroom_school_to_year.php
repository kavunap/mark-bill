<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeClassroomSchoolToYear extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('classrooms', function (Blueprint $table) {
            $table->dropForeign('classrooms_school_id_foreign');
            $table->dropColumn('school_id');
            $table->unsignedBigInteger('archive_id');
            $table->foreign('archive_id')->references('id')->on('archives')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('classrooms', function (Blueprint $table) {
            $table->dropForeign('classrooms_archive_id_foreign');
            $table->dropColumn('archive_id');
            $table->unsignedBigInteger('school_id');
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
        });
    }
}
