<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('vote_count')->default(0);
            $table->boolean('video')->default(false);
            $table->decimal('vote_average')->default(0);
            $table->string('title',255)->nullable();
            $table->decimal('popularity')->default(0);
            $table->string('poster_path')->nullable();
            $table->string('original_language',2);
            $table->string('original_title',255);
            $table->string('genre_ids')->nullable();
            $table->string('backdrop_path')->nullable();
            $table->boolean('adult')->default(false);
            $table->text('overview')->nullable();
            $table->date('release_date')->nullable();
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
        Schema::dropIfExists('movies');
    }
}
