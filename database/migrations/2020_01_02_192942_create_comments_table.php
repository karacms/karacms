<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('creator_id')->nullable();
            $table->bigInteger('content_id')->nullable();
            $table->bigInteger('parent_id')->nullable();
            $table->string('title', 180)->nullable();
            $table->longText('content')->nullable();
            $table->string('status', 50)->nullable();
            $table->json('meta')->nullable();
            $table->float('rating')->nullable();
            $table->integer('instance_id');

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
        Schema::dropIfExists('comments');
    }
}
