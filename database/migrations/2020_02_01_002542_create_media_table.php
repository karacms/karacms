<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('creator_id')->nullable();
            $table->string('title', 255)->nullable();
            $table->text('description')->nullable();
            $table->binary('data')->nullable(); // Store directly on DB
            $table->text('url')->nullable(); // Store the path only
            $table->json('meta')->nullable();
            $table->string('type', 40)->nullable();
            $table->integer('instance_id')->nullable();
            
            // If the media is cloned, resized, cropped, we will store the parent_id
            $table->integer('parent_id')->nullable();
            
            $table->softDeletes();
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
        Schema::dropIfExists('media');
    }
}
