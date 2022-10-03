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
        Schema::create('posts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->text('content')->nullable();
            $table->uuid('category_id')->references('id')->on('category');
            $table->string('image')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->integer('hits')->default(0)->unsigned();
            $table->integer('status')->nullable();
            $table->integer('moderated_by')->unsigned()->nullable();
            $table->datetime('moderated_at')->nullable();
            $table->uuid('created_by')->unsigned()->nullable();
            $table->uuid('updated_by')->unsigned()->nullable();
            $table->uuid('deleted_by')->unsigned()->nullable();
            $table->uuid('restore_by')->unsigned()->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
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