<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alumne;
use App\Models\Centre;
use App\Models\Ensenyament;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Centre::factory()->times(10)->create();
        Ensenyament::factory()->times(10)->create();
        Alumne::factory()->times(100)->create();
    }
}
