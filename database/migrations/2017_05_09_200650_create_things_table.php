<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThingsTable extends Migration
{
    /**
     * Creates table for Redditors and Subreddits
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thing', function (Blueprint $table) {
            $table->increments('id');
            
            // https://www.reddit.com/dev/api#fullnames
            $table->string('reddit_id', 20)->unique();
            
            // e.g. 'kittsville' or 'HighQualityGifs'
            $table->string('name', 20)->unique();
            $table->enum('type', ['user', 'subreddit']);
            $table->boolean('excluded');
            $table->timestamps();
        });
    }

    /**
     * Removes table containing Redditors and Subreddits
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('thing');
    }
}
