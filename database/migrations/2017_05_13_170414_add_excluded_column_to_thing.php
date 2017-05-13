<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExcludedColumnToThing extends Migration
{
    /**
     * Adds default 'false' value to whether Thing is automatically excluded
     * from detection. Exclusions apply to bots owing to their diverse
     * participation history making them susceptible to false detection.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('thing', function (Blueprint $table) {
            $table->boolean('excluded')
                ->default(false)
                ->after('type');
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
            $table->dropColumn('excluded');
        });
    }
}
