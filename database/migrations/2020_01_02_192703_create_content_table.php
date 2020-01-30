<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('author_id')->nullable();
            $table->string('title')->nullable();
            $table->string('slug', 170)->nullable();
            $table->longText('content')->nullable();
            $table->json('meta')->nullable();
            $table->string('status', 50)->nullable();
            $table->integer('instance_id')->nullable();

            $table->unique(['instance_id', 'slug']);
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
        Schema::dropIfExists('content');
    }
}
