<?php

namespace Database\Seeders;

use App\Models\Hobby;
use Illuminate\Database\Seeder;

class hobbiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Hobby::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
