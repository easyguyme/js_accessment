<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = Carbon::now();

        $data = [
            ['title' => 'Admin', 'nickname' => 'job_admin','created_at' => $currentTimestamp,'updated_at' => $currentTimestamp],
            ['title' => 'Covid19', 'nickname' => 'job_covid19','created_at' => $currentTimestamp,'updated_at' => $currentTimestamp],
            ['title' => 'Customer Service', 'nickname' => 'job_customerservice','created_at' => $currentTimestamp,'updated_at' => $currentTimestamp],
            ['title' => 'Distribution Shipping', 'nickname' => 'job_distributionshipping','created_at' => $currentTimestamp,'updated_at' => $currentTimestamp],
            ['title' => 'Grocery', 'nickname' => 'job_grocery','created_at' => $currentTimestamp,'updated_at' => $currentTimestamp],
            ['title' => 'Hospitality Hotel', 'nickname' => 'job_hospitalityhotel','created_at' => $currentTimestamp,'updated_at' => $currentTimestamp],
            ['title' => 'Marketing Sales', 'nickname' => 'job_marketingsales','created_at' => $currentTimestamp,'updated_at' => $currentTimestamp],
            ['title' => 'Production', 'nickname' => 'job_production','created_at' => $currentTimestamp,'updated_at' => $currentTimestamp],
            ['title' => 'Restaurant Food Service', 'nickname' => 'job_restaurantfoodservice','created_at' => $currentTimestamp,'updated_at' => $currentTimestamp],
            ['title' => 'Retail', 'nickname' => 'job_retail','created_at' => $currentTimestamp,'updated_at' => $currentTimestamp],
            ['title' => 'Supply chain', 'nickname' => 'job_supplychain','created_at' => $currentTimestamp,'updated_at' => $currentTimestamp],
            ['title' => 'Transportation', 'nickname' => 'job_transportation','created_at' => $currentTimestamp,'updated_at' => $currentTimestamp],
            ['title' => 'Warehouse', 'nickname' => 'job_warehouse','created_at' => $currentTimestamp,'updated_at' => $currentTimestamp],
            ['title' => 'Other', 'nickname' => 'job_other','created_at' => $currentTimestamp,'updated_at' => $currentTimestamp],


        ];

        DB::table('job_categories')->insert($data);
    }
}
