<?php

namespace Database\Seeders;

use App\Models\Hobby;
use Illuminate\Database\Seeder;

class HobbiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Hobby::factory()->create([
            'name' => 'Fabrication de biscuits',
            'type' => 'Cuisine',
        ]);
        Hobby::factory()->create([
            'name' => 'Fabrication de Sucre D\'ogre',
            'type' => 'Cuisine',
        ]);
        Hobby::factory()->create([
            'name' => 'Nourrir les rennes',
            'type' => 'Elevage',
        ]);
        Hobby::factory()->create([
            'name' => 'Réparation du Traîneaux',
            'type' => 'Atelier',
        ]);
        Hobby::factory()->create([
            'name' => 'Emballage des Cadeaux',
            'type' => 'Production',
        ]);
        Hobby::factory()->create([
            'name' => 'Réparer les jouets',
            'type' => 'Production',
        ]);
        Hobby::factory()->create([
            'name' => 'Création de bonhomme de neige',
            'type' => 'Elevage',
        ]);
    }
}
