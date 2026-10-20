<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $facilities = [
            [
                'name' => 'Zona de Pesas Libres',
                'description' => '6 racks olímpicos, plataformas de deadlift, mancuernas hasta 50kg',
                'image_url' => 'https://images.unsplash.com/photo-1775993703558-e7afab02b7bd?auto=format&fit=crop&w=1000&q=80',
                'display_size' => 'wide-tall',
            ],
            [
                'name' => 'Zona de Máquinas',
                'description' => 'Circuito completo selectorizado, cable crossover, máquinas Hammer Strength',
                'image_url' => 'https://images.unsplash.com/photo-1571902943202-507ec2618e8f?auto=format&fit=crop&w=1000&q=80',
                'display_size' => 'wide',
            ],
            [
                'name' => 'Studio Clases Grupales',
                'description' => '2 salas insonorizadas, suelo técnico, sonido profesional, espejos',
                'image_url' => 'https://images.unsplash.com/photo-1524594152303-9fd13543fe6e?auto=format&fit=crop&w=1000&q=80',
                'display_size' => 'standard',
            ],
            [
                'name' => 'Zona Cardio',
                'description' => '12 cintas, 8 elípticas, 6 remos Concept2, 4 Air Bikes, escaladoras',
                'image_url' => 'https://images.unsplash.com/photo-1775993167571-cd1ff4cadada?auto=format&fit=crop&w=1000&q=80',
                'display_size' => 'standard',
            ],
            [
                'name' => 'Área Funcional',
                'description' => '300m² césped artificial, rigs, kettlebells, battle ropes, sleds',
                'image_url' => 'https://images.unsplash.com/photo-1758875569136-9936939e6179?auto=format&fit=crop&w=1000&q=80',
                'display_size' => 'standard',
            ],
            [
                'name' => 'Vestidores Premium',
                'description' => 'Lockers inteligentes, duchas de lluvia, sauna, zona de relax',
                'image_url' => 'https://images.unsplash.com/photo-1774876549411-52e4eaff626e?auto=format&fit=crop&w=1000&q=80',
                'display_size' => 'standard',
            ],
            [
                'name' => 'Zona de Recuperación',
                'description' => 'Foam rollers, Theraguns, botas de compresión, camillas de estiramiento',
                'image_url' => 'https://images.unsplash.com/photo-1761284758997-1074f2a33114?auto=format&fit=crop&w=1000&q=80',
                'display_size' => 'standard',
            ],
            [
                'name' => 'Recepción y Lounge',
                'description' => 'WiFi, barra de batidos, zona de trabajo, tienda de suplementos',
                'image_url' => 'https://images.unsplash.com/photo-1777703838688-0080502d919a?auto=format&fit=crop&w=1000&q=80',
                'display_size' => 'standard',
            ],
        ];

        foreach ($facilities as $sortOrder => $facility) {
            Facility::updateOrCreate(
                ['name' => $facility['name']],
                [...$facility, 'is_active' => true, 'sort_order' => $sortOrder + 1],
            );
        }
    }
}
