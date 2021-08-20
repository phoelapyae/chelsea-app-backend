<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('position_id')->default(0);
            $table->unsignedInteger('team_type_id')->default(0);
            $table->unsignedInteger('work_type_id')->default(1);
            $table->unsignedInteger('nation_id')->default(0);
            $table->string('name')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('number')->unique()->default(0);
            $table->date('date_of_birth')->nullable();
            $table->string('birthplace')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->longText('biography')->nullable();
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
        Schema::dropIfExists('teams');
    }
}
