<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToResult extends Migration
{
    /**
     * Creates 'state' column to indicate the Result's stage in being processed
     *
     * @return void
     */
    public function up()
    {
        Schema::table('result', function (Blueprint $table) {
            $table->enum('state', [
                'validating', # Checks input thread/subreddit on Reddit
                'rejected',   # Rejected for bad input
                'collecting', # Collects list of users in the thread
                'analysing',  # Analyses the post history of each user
                'failed',     # Something went wrong
                'finished',   # Successfully completed request
            ])->default('validating')->after('url');
        });
    }

    /**
     * Removes 'stage' column from Result
     *
     * @return void
     */
    public function down()
    {
        Schema::table('result', function (Blueprint $table) {
            $table->dropColumn('state');
        });
    }
}
