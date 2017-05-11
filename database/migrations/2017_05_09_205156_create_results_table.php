<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Creates table to store results of Raofu's analyses
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result', function (Blueprint $table) {
            $table->increments('id');
            
            // Unique YouTube-style ID e.g. tg8BaOaQKxQ
            $table->string('url', 11)->unique();
            
            // Who told Raofu to run the analysis
            $table->integer('author_id')->unsigned();
            $table->foreign('author_id')
                ->references('id')
                ->on('thing')
                ->onDelete('cascade');
            
            // Subreddit that has been brigaded
            $table->integer('alpha_id')->unsigned();
            $table->foreign('alpha_id')
                ->references('id')
                ->on('thing')
                ->onDelete('cascade');
            
            // Subreddit responsible for brigading
            $table->integer('beta_id')->unsigned();
            $table->foreign('beta_id')
                ->references('id')
                ->on('thing')
                ->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Removes table containing results of Raofu's analyses
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('result');
    }
}
