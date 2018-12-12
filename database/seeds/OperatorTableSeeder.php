<?php

use Illuminate\Database\Seeder;
use App\Operator;
use Carbon\Carbon;

class OperatorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $operator_records = [
            ['id' => 1, 'corporate_name' => 'OANDO PLC', 'rc_number' => 'RC266728', 'email' => 'support@oandoplc.com', 'oaan_number' => 'OAAN/OPR/2018/55515', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 2, 'corporate_name' => 'DATA CAMPAIGNE HUB', 'rc_number' => 'RC895421', 'email' => 'support@datacampaignehub.com', 'oaan_number' => 'OAAN/OPR/2018/99979', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 3, 'corporate_name' => 'VENDESAL PASTE LIMITED', 'rc_number' => 'RC287758', 'email' => 'support@vendesal.com', 'oaan_number' => 'OAAN/OPR/2018/98545', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        foreach( $operator_records as $key => $operator_record ) {
            Operator::create($operator_record);
        }
    }
}
