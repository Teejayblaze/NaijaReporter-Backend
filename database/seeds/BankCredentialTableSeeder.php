<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\BankCredential;

class BankCredentialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $bank_cred_records = [
            ['id' => 1, 'loginid' => 'oandoplc', 'pin' => '11111111', 'token' => '222222', 'bank_account_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 2, 'loginid' => 'datacampaigne-hub', 'pin' => '22222222', 'token' => '333333', 'bank_account_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 3, 'loginid' => 'vendesal', 'pin' => '33333333', 'token' => '444444', 'bank_account_id' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 4, 'loginid' => 'datashare-services', 'pin' => '44444444', 'token' => '555555', 'bank_account_id' => 4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 5, 'loginid' => 'spv2-services', 'pin' => '55555555', 'token' => '666666', 'bank_account_id' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        foreach( $bank_cred_records as $key => $bank_cred_record ) {
            BankCredential::create($bank_cred_record);
        }
    }
}
