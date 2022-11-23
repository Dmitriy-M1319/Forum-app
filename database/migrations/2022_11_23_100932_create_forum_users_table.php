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
        Schema::dropIfExists('forum_user');
        Schema::create('forum_user', function (Blueprint $table) {
            $table->string('nickname', 30)->primary();
            $table->string('password');
            $table->integer('role');
            $table->rememberToken();
            $table->date('register_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forum_user');
    }
};
