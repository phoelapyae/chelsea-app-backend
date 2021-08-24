<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeagueTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('league_tables', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('opponent_id')->default(0);
            $table->integer('pwal')->default(0);
            $table->integer('win')->default(0);
            $table->integer('draw')->default(0);
            $table->integer('lose')->default(0);
            $table->integer('GF')->default(0);
            $table->integer('GD')->default(0);
            $table->integer('GA')->default(0);
            $table->integer('pts')->default(0);
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
        Schema::dropIfExists('league_tables');
    }
}
