<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->addColumn('integer', 'category_id')->nullable()->default(0);
        });
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->timestamps();
        });
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->timestamps();
        });
        Schema::create('image_tag', function (Blueprint $table) {
            $table->id();
            $table->integer('image_id');
            $table->integer('tag_id');
            $table->text('memo')->default('');
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
        Schema::table('images', function (Blueprint $table) {
            $table->dropColumn('category_id');
        });
        Schema::dropIfExists('categories');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('image_tags');
    }
}
