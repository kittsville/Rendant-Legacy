<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddThreadColumnToResult extends Migration
{
    /**
     * Adds link to thread Result shows analysis of
     *
     * @return void
     */
    public function up()
    {
        Schema::table('result', function (Blueprint $table) {
            $table->integer('thread_id')
                ->unsigned()
                ->after('state');
            $table->foreign('thread_id')
                ->references('id')
                ->on('thread')
                ->onDelete('cascade');
        });
    }

    /**
     * Removes 'thread_id' column from Result
     *
     * @return void
     */
    public function down()
    {
        Schema::table('result', function (Blueprint $table) {
            $table->dropForeign('result_thread_id_foreign');
            $table->dropColumn('thread_id');
        });
    }
}
