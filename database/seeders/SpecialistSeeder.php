<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


use App\Models\MasterData\Specialist;

class SpecialistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $specialist = [
            [
                'name' => 'Dermatology',
                'price' => '100000'
            ],
            [
                'name' => 'Neurology',
                'price' => '200000'
            ],
            [
                'name' => 'Dentist',
                'price' => '150000'
            ],
            [
                'name' => 'Allergists',
                'price' => '300000'
            ],
            [
                'name' => 'Cardiologists',
                'price' => '320000'
            ],

        ];

        Specialist::insert($specialist);
    }
}
