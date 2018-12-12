<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankCredentialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_credentials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('loginid');
            $table->string('pin');
            $table->string('token');
            $table->unsignedInteger('bank_account_id');
            $table->foreign('bank_account_id')->references('id')->on('bank_accounts');
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
        Schema::dropIfExists('bank_credentials');
    }
}
