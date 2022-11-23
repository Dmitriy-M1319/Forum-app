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
        Schema::create('comment', function (Blueprint $table) {
            $table->id('comm_id');
            $table->integer('post_id');
            $table->foreign('post_id')->references('post_id')->on('post');
            $table->string('nickname', 30);
            $table->foreign('nickname')->references('nickname')->on('forum_user');
            $table->text('comm_text');
            $table->integer('carma');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forum_comment');
    }
};
