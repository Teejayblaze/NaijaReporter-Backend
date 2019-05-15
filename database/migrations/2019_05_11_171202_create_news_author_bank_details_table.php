<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsAuthorBankDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_author_bank_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('account_holder_fullname');
            $table->string('account_number');
            $table->string('bank_name');
            $table->unsignedInteger('author_id');
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
        Schema::dropIfExists('news_author_bank_details');
    }
}
