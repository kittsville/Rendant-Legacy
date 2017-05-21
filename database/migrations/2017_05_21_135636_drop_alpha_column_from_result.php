<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropAlphaColumnFromResult extends Migration
{
    /**
     * Removes reference in Results table to brigaded subreddit ID (alpha_id)
     * It was made redundant by migration 190003, which states the alpha_id through the Thread table
     *
     * @return void
     */
    public function up()
    {
        Schema::table('result', function (Blueprint $table) {
            $table->dropForeign('result_alpha_id_foreign');
            $table->dropColumn('alpha_id');
        });
    }

    /**
     * Restores 'alpha_id' column to Results table
     *
     * @return void
     */
    public function down()
    {
        Schema::table('result', function (Blueprint $table) {
            // Subreddit that has been brigaded
            $table->integer('alpha_id')
                ->unsigned()
                ->after('author_id');
            $table->foreign('alpha_id')
                ->references('id')
                ->on('thing')
                ->onDelete('cascade');
        });
    }
}
