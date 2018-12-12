<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankAccountTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_account_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('recipient_bank_type');
            $table->string('recipient_bank')->nullable();
            $table->string('recipient_account_num');
            $table->string('account');
            $table->unsignedDecimal('amount', 15, 2);
            $table->string('description');
            $table->unsignedInteger('bank_acct_id');
            $table->foreign('bank_acct_id')->references('id')->on('bank_accounts');
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
        Schema::dropIfExists('bank_account_transactions');
    }
}
