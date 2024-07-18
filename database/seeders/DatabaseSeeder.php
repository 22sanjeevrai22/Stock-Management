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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Sasuke',
            'email' => 'sasuke@gmail.com',
            'password' => bcrypt('sasuke')
        ]);

        $this->call([
            CategorySeeder::class,
            BrandSeeder::class,
            SupplierSeeder::class,
            // ProductSeeder should be below above Seeder
            ProductSeeder::class,
        ]);
    }
}
