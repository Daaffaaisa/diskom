<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersTableSeeder::class);
        $this->call(GuruTendikTableSeeder::class);
        $this->call(BeritasTableSeeder::class);
        $this->call(KeluhKesahTableSeeder::class);
        $this->call(PrestasisTableSeeder::class);
        
    }
}
