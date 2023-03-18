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
        Schema::create('blogcomment_replies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blogcomment_id');
            $table->unsignedBigInteger('auth_id');
            $table->longText('description');
            $table->foreign('blogcomment_id')->references('id')->on('blog_comments')->onDelete('cascade');
            $table->foreign('auth_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('blogcomment_replies');
    }
};
