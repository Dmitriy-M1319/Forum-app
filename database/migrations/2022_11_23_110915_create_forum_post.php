<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->id('post_id');
            $table->string('nickname', 30);
            $table->foreign('nickname')->references('nickname')->on('forum_user');
            $table->timestamp('date_create');
            $table->text('post_text');
            $table->integer('carma');
            $table->integer('thread_id');
            $table->foreign('thread_id')->references('thread_id')->on('thread');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forum_post');
    }
};
