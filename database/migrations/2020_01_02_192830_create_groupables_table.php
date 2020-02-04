<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groupables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('group_id');
            $table->morphs('groupable');


            // Self Relation, for example: Related Posts, Related Users...
            $table->string('from_type')->nullable();
            $table->integer('from_id')->nullable();
            $table->string('to_type')->nullable();
            $table->integer('to_id')->nullable();
            $table->string('direction')->nullable(); // one-way, bidirection

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
        Schema::dropIfExists('groupables');
    }
}