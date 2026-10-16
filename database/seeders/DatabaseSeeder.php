<?php

namespace Database\Seeders;

use App\Models\{Category, User};
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'role' => 'admin',
            'name' => 'Deko',
            'email' => 'deko.bad228@gmail.com',
            'password' => '12345678'
        ]);

        User::factory()->create([
            'role' =>  'agent',
            'name' => 'Stasik',
            'email' => 'stasik@gmail.com',
            'password' => '12345678'
        ]);

        User::factory()->create([
            'role' =>  'customer',
            'name' => 'Vadim',
            'email' => 'vadim@gmail.com',
            'password' => '12345678'
        ]);

        Category::factory()->create([
            'name' => 'default',
            'sla_first_response_minutes' => 30,
            'sla_resolution_minutes' => 240
        ]);
    }
}
