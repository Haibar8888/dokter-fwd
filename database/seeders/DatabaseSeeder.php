<?php

namespace Database\Seeders;

use App\Models\MasterData\ConfigPayment;
use App\Models\MasterData\Consultation;
use App\Models\MasterData\TypeUser;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(
            [
                Specialist::class,
                ConfigPayment::class,
                Consultation::class,
                TypeUser::class,
            ]
        );
    }
}
