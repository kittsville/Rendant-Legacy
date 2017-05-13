<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropTypeColumnFromThing extends Migration
{
    /**
     * Removes column to determine whether Thing is a Redditor or a subreddit
     *
     * @return void
     */
    public function up()
    {
        Schema::table('thing', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }

    /**
     * Restores 'type' column
     *
     * @return void
     */
    public function down()
    {
        Schema::table('thing', function (Blueprint $table) {
            $table->enum('type', ['user', 'subreddit'])->after('name');
        });
    }
}
