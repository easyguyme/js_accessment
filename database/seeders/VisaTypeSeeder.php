<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class VisaTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = Carbon::now();
        $data = [
            ['name' => 'Visa All', 'nickname' => 'visa_all','created_at' => $currentTimestamp,'updated_at' => $currentTimestamp],
            ['name' => 'Visa DP', 'nickname' => 'visa_dp','created_at' => $currentTimestamp,'updated_at' => $currentTimestamp],
            ['name' => 'Visa EP', 'nickname' => 'visa_ep','created_at' => $currentTimestamp,'updated_at' => $currentTimestamp],
            ['name' => 'Visa F', 'nickname' => 'visa_f','created_at' => $currentTimestamp,'updated_at' => $currentTimestamp],
            ['name' => 'Visa LTVP', 'nickname' => 'visa_ltvp','created_at' => $currentTimestamp,'updated_at' => $currentTimestamp],
            ['name' => 'Visa MY', 'nickname' => 'visa_my','created_at' => $currentTimestamp,'updated_at' => $currentTimestamp],
            ['name' => 'Visa SG', 'nickname' => 'visa_sg','created_at' => $currentTimestamp,'updated_at' => $currentTimestamp],
            ['name' => 'Visa SP', 'nickname' => 'visa_sp','created_at' => $currentTimestamp,'updated_at' => $currentTimestamp],
            ['name' => 'Visa WP', 'nickname' => 'visa_wp','created_at' => $currentTimestamp,'updated_at' => $currentTimestamp],

        ];

        DB::table('visa_types')->insert($data);

    }
}
