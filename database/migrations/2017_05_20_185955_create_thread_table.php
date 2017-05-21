<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thread', function (Blueprint $table) {
            $table->increments('id');
            
            // https://www.reddit.com/dev/api#fullnames
            $table->string('reddit_id', 20)->unique();
            
            $table->string('title',     300); # 'Updoot this to the frontpage!'
            $table->string('permalink', 50);  # 'updoot_this_to_the_frontpage'
            
            // Subreddit that has been brigaded
            $table->integer('subreddit_id')->unsigned();
            $table->foreign('subreddit_id')
                ->references('id')
                ->on('thing')
                ->onDelete('cascade');
            
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
        Schema::drop('thread');
    }
}
