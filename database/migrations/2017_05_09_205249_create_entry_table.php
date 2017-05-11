<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntryTable extends Migration
{
    /**
     * Creates table to store users detected by Raofu as brigaders
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entry', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('result_id')->unsigned();
            $table->foreign('result_id')
                ->references('id')
                ->on('result')
                ->onDelete('cascade');
            
            // Naughty user caught brigading
            $table->integer('thing_id')->unsigned();
            $table->foreign('thing_id')
                ->references('id')
                ->on('thing')
                ->onDelete('cascade');
            
            /*
             * 0-100 (with 1 digit precision) 
             * Percentage of participation in brigading/brigaded subreddits
             */
            $table->smallInteger('alpha_participation')->unsigned();
            $table->smallInteger('beta_participation')->unsigned();
        });
    }

    /**
     * Removes table containing users detected as brigading
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('entry');
    }
}
