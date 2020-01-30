<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('author_id')->nullable();
            $table->string('title')->nullable();
            $table->string('slug', 150)->nullable();
            $table->longText('content')->nullable();
            $table->json('meta')->nullable();
            $table->string('status', 50)->nullable();
            $table->string('type', 30)->nullable();
            $table->integer('instance_id')->nullable();

            $table->unique(['instance_id', 'slug', 'type']);
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
        Schema::dropIfExists('contents');
    }
}
