<?php

namespace Database\Seeders;

use App\Models\Barber;
use Illuminate\Database\Seeder;

class BarberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barbers = [
            ['name' => 'Alex'],
            ['name' => 'Ryan'],
            ['name' => 'Wahid'],
            ['name' => 'Danu'],
        ];

        foreach ($barbers as $barber) {
            Barber::create($barber);
        }
    }
}
