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
            $table->string('recipient_bank_type')->nullable();
            $table->string('recipient_bank')->nullable();
            $table->string('recipient_account_num');
            $table->string('reference');
            $table->string('account');
            $table->unsignedDecimal('amount', 20, 2);
            $table->string('asset_name');
            $table->string('description');
            $table->string('trnx_id');
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
