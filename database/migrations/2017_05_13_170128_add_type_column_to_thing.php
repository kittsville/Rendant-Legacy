<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeColumnToThing extends Migration
{
    /**
     * Removes column to determine whether Thing is a Redditor or a subreddit,
     * now with the default of being a Redditor.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('thing', function (Blueprint $table) {
            $table->enum('type', ['user', 'subreddit'])
                ->default('user')
                ->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('thing', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
