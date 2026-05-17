<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
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