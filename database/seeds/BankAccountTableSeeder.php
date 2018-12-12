<?php

use Illuminate\Database\Seeder;
use App\BankAccount;
use Carbon\Carbon;

class BankAccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $bank_acct_records = [
            ['id' => 1, 'corporate_name' => 'OANDO PLC', 'rc_number' => 'RC266728', 'email' => 'support@oandoplc.com', 'account' => '1245667989', 'available_balance' => '800000000.00', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 2, 'corporate_name' => 'DATA CAMPAIGNE HUB', 'rc_number' => 'RC895421', 'email' => 'support@datacampaignehub.com', 'account' => '2133564893', 'available_balance' => '10000000.65', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 3, 'corporate_name' => 'VENDESAL PASTE LIMITED', 'rc_number' => 'RC287758', 'email' => 'support@vendesal.com', 'account' => '1034567828', 'available_balance' => '20000000.55', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 4, 'corporate_name' => 'DATASHARE SERVICES LIMITED', 'rc_number' => 'RC772285', 'email' => 'support@datashare.com', 'account' => '2117889012', 'available_balance' => '800000000.39', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 5, 'corporate_name' => 'SPV2 SERVICES LIMITED', 'rc_number' => 'RC896654', 'email' => 'support@spv2.com', 'account' => '2133378610', 'available_balance' => '50000000.78', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        foreach( $bank_acct_records as $key => $bank_acct_record ) {
            BankAccount::create($bank_acct_record);
        }
    }
}
