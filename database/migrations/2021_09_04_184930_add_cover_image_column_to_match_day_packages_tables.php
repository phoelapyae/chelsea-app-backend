<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCoverImageColumnToMatchDayPackagesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('match_day_packages', function (Blueprint $table) {
            $table->string('cover_image')->nullable()->before('bg_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('match_day_packages', function (Blueprint $table) {
            $table->dropColumn('cover_image');
        });
    }
}
