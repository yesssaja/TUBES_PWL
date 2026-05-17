<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            ServiceSeeder::class,
        ]);

       $this->call([
    UserSeeder::class,
    AdminSeeder::class,
    PerusahaanSeeder::class,
    LokerSeeder::class,
    EventSeeder::class,
    RsvpSeeder::class,
    LamaranSeeder::class,
    GroupSeeder::class,
]);
    }
}