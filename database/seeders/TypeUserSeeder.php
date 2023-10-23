<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\MasterData\TypeUser;

class TypeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $type_user = [
            [
                'name' => 'admin'
            ],
            [
                'name' => 'dokter'
            ],
            [
                'name' => 'pasien'
            ],
        ];

        TypeUser::insert($type_user);
    }
}
