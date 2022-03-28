<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('competition_id');
            $table->foreign('competition_id')->references('id')->on('competitions');
            $table->timestamp('starts_at');
            $table->unsignedBigInteger('home_club_id');
            $table->foreign('home_club_id')->references('id')->on('clubs');
            $table->unsignedBigInteger('away_club_id');
            $table->foreign('away_club_id')->references('id')->on('clubs');
            $table->integer('home_score')->nullable();
            $table->integer('away_score')->nullable();
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
        Schema::dropIfExists('games');
    }
}
