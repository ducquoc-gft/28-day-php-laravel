<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Duc Quoc',
            'email' => 'admin@ducquoc.net',
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Data Test',
        //     'email' => 'dqonline@ducquoc.net',
        // ]);

        \App\Models\User::factory(10)->create();
        \App\Models\User::factory(2)->unverified()->create();
        \App\Models\Task::factory(20)->create();
    }
}
