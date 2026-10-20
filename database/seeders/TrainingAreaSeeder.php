<?php

namespace Database\Seeders;

use App\Models\TrainingArea;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainingAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areas = [
            [
                'name' => 'Musculación',
                'description' => 'Zona de pesas libres y máquinas',
                'image_url' => 'https://images.unsplash.com/photo-1583454110551-21f2fa2afe61?w=800&q=80',
                'equipment' => json_encode(['Mancuernas 2-50kg', 'Barras olímpicas y discos', 'Racks de sentadilla', 'Máquinas selectorizadas']),
            ],
            [
                'name' => 'Cardio',
                'description' => 'Equipos de última generación',
                'image_url' => 'https://images.unsplash.com/photo-1571902943202-507ec2618e8f?w=800&q=80',
                'equipment' => json_encode(['Cintas de correr', 'Elípticas y bicicletas', 'Remos Concept2', 'Escaladoras y Air Bikes']),
            ],
            [
                'name' => 'Funcional',
                'description' => 'Espacio abierto y versátil',
                'image_url' => 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=800&q=80',
                'equipment' => json_encode(['Kettlebells', 'Medicine balls & Wall balls', 'Battle ropes & Sleds', 'Plyo boxes & Anillas']),
            ],
            [
                'name' => 'Clases Grupales',
                'description' => 'Más de 50 clases/semana',
                'image_url' => 'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?w=800&q=80',
                'equipment' => json_encode(['HIIT & Cross Training', 'Yoga & Mobility', 'Spinning & RPM', 'Zumba & Body Combat']),
            ],
        ];

        foreach ($areas as $sortOrder => $area) {
            TrainingArea::updateOrCreate(
                ['name' => $area['name']],
                [...$area, 'is_active' => true, 'sort_order' => $sortOrder + 1],
            );
        }
    }
}
