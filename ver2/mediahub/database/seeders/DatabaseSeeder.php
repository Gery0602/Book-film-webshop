<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class, // Szerepkörök beállítása
            // Ide jöhet még egy ProductSeeder, ha termékeket is akarsz feltölteni
        ]);
    }
}