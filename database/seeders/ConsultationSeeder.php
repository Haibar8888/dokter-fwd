<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use app\Models\MasterData\Consultation;

class ConsultationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $consultation = [
                [
                    'name' => 'Jantung Sesak'
                ],
                [
                    'name' => 'Tekanan Darah Tinggi'
                ],
                [
                    'name' => 'Gangguan Irama Jantung'
                ],
            ];
        
        Consultation::insert($consultation);
    }
}
