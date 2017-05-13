<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropExcludedColumnFromThing extends Migration
{
    /**
     * Removes column to determine whether to automatically exclude Thing
     * from detection for being a bot.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('thing', function (Blueprint $table) {
            $table->dropColumn('excluded');
        });
    }

    /**
     * Restores 'excluded' column
     *
     * @return void
     */
    public function down()
    {
        Schema::table('thing', function (Blueprint $table) {
            $table->boolean('excluded')->after('type');
        });
    }
}
