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
        Schema::create('posts',function(Blueprint $table){

            $table->id();
            $table->string('title',100);
            $table->string('body',800)->nullable();
            $table->string('slug');
            $table->string('image',800)->nullable();
            $table->foreignId('user_id')->constrained();
            $table->boolean('is_public')->default(0);
            $table->integer('likes')->default(0);
            $table->integer('comments')->default(0);
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
        Schema::dropIfExists('posts');
    }
};
