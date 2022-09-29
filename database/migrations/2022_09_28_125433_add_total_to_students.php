<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTotalToStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->integer('total_term1')->nullable()->default(0);
            $table->integer('total_term2')->nullable()->default(0);
            $table->integer('total_term3')->nullable()->default(0);
            $table->string('rank_term1')->nullable();
            $table->string('rank_term2')->nullable();
            $table->string('rank_term3')->nullable();
            $table->string('rank_year')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('total_term1');
            $table->dropColumn('total_term2');
            $table->dropColumn('total_term3');
            $table->dropColumn('rank_term1');
            $table->dropColumn('rank_term2');
            $table->dropColumn('rank_term3');
            $table->dropColumn('rank_year');
            // $table->dropColumn('rank_year');
        });
    }
}
