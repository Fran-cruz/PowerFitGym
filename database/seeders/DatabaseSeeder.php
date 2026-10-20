<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::factory()->create([
            'name' => 'Fran',
            'email' => 'fraj_cruzf38@unicah.edu',
            'password' => bcrypt('Filament123'),
        ]);

        $this->call([
            TrainerSeeder::class,
            MembershipPlanSeeder::class,
            TrainingAreaSeeder::class,
            GroupClassSeeder::class,
            FacilitySeeder::class,
            FeatureSeeder::class,
            ContactMessageSeeder::class,
        ]);
    }
}
