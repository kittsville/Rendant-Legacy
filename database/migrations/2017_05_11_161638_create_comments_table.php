<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Creates table to store comments in brigaded thread by brigading users
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->integer('entry_id')->unsigned();
            $table->foreign('entry_id')
                ->references('id')
                ->on('entry')
                ->onDelete('cascade');
            
            /*
             * Comment ID
             * The 'dcrytvx' in /r/CatsStandingUp/comments/5pl4uk/cat/dcrytvx/
             */
            $table->string('id', 20)->unique();
        });
    }

    /**
     * Removes table containing comments by users detected as brigading
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comment');
    }
}
