<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\MasterData\ConfigPayment;

class ConfigPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $configPayment = [
                [
                    'fee' => '10000',
                    'vat' => '20', // is percen
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
            ];

        ConfigPayment::insert($configPayment);
    }
}
