<?php

namespace Database\Seeders;

use App\Models\Hobby;
use App\Models\User;
use Illuminate\Database\Seeder;

class HobbiesUserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $hobbies = Hobby::all();

        foreach ($users as $user) {
            for ($i = 0; $i < rand(1,3); $i++) {
                $hobbyFindRandomly = $hobbies->random();
                $user->hobbies()->attach($hobbyFindRandomly);
                $hobbyFindRandomly->users()->attach($user->id);
            }
        }
    }
}
