<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('news_title');
            $table->text('news_body');
            $table->unsignedInteger('news_category_id');
            $table->unsignedInteger('author_id');
            $table->foreign('news_category_id')->references('id')->on('news_categories');
            $table->foreign('author_id')->references('id')->on('news_authors');
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
        Schema::dropIfExists('news_reports');
    }
}
