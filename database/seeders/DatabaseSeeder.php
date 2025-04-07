<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Neighborhood;
use App\Models\State;
use App\Models\UserType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        State::factory()->createMany([
            ['name' => 'En espera'],
            ['name' => 'En curso'],
            ['name' => 'Finalizado'],
        ]);

        UserType::factory()->createMany([
            ['name' => 'Conductor'],
            ['name' => 'Pasajero'],
        ]);

        Neighborhood::factory()->createMany([
            ['name' => 'Centro'],
            ['name' => 'Albania'],
            ['name' => 'Ricaurte'],
            ['name' => 'Terrazas'],
            ['name' => 'Divino niño'],
            ['name' => 'Industrial'],
            ['name' => 'Miramar'],
            ['name' => 'Boqueron'],
            ['name' => 'San isidro'],
        ]);
    }
}
