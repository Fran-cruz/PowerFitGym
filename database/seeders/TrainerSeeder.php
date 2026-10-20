<?php

namespace Database\Seeders;

use App\Models\Trainer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trainers = [
            [
                'name' => 'Carlos Mendoza',
                'specialty' => 'Hipertrofia y Fuerza',
                'certifications' => json_encode(['NSCA-CPT', 'Fisioterapia Deportiva']),
                'years_experience' => 8,
                'biography' => 'Especialista en ganancia de masa muscular y fuerza. Ha competido en fisicoculturismo a nivel nacional y certificado en prevención de lesiones.',
                'image_url' => 'https://images.unsplash.com/photo-1526506118085-60ce8714f8c5?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'name' => 'Ana Rodríguez',
                'specialty' => 'Entrenamiento Funcional y Movilidad',
                'certifications' => json_encode(['CrossFit L2', 'FMS', 'Animal Flow']),
                'years_experience' => 6,
                'biography' => 'Apasionada del movimiento funcional y la movilidad. Certificada en Functional Movement Systems y Animal Flow. Enfoque en calidad de movimiento.',
                'image_url' => 'https://images.unsplash.com/photo-1548690312-e3b507d8c110?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'name' => 'Roberto Silva',
                'specialty' => 'Acondicionamiento Físico y Deportes',
                'certifications' => json_encode(['ACSM-CPT', 'Entrenador Deportivo', 'Nutrición Deportiva']),
                'years_experience' => 10,
                'biography' => 'Ex-atleta de alto rendimiento, ahora entrena deportistas amateurs y profesionales. Enfoque en periodización y rendimiento deportivo.',
                'image_url' => 'https://images.unsplash.com/photo-1786025054551-072ea2dd349c?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'name' => 'Mariana López',
                'specialty' => 'Pérdida de Peso y Recomposición',
                'certifications' => json_encode(['NASM-CPT', 'CES', 'Nutrición Clínica']),
                'years_experience' => 7,
                'biography' => 'Especialista en transformación corporal sostenible. Combina entrenamiento de fuerza con nutrición flexible. Certificada en Corrective Exercise.',
                'image_url' => 'https://images.unsplash.com/photo-1561402811-8cf986c35eec?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'name' => 'David Chen',
                'specialty' => 'Powerlifting y Fuerza Máxima',
                'certifications' => json_encode(['IPF Coach', 'Starting Strength Coach']),
                'years_experience' => 9,
                'biography' => 'Entrenador de powerlifting competitivo. Sus atletas han batido récords nacionales. Enfoque en técnica perfecta de los tres grandes.',
                'image_url' => 'https://images.unsplash.com/photo-1550977616-efc580084ac5?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'name' => 'Sofía Herrera',
                'specialty' => 'Yoga Terapéutico y Movilidad',
                'certifications' => json_encode(['RYT-500', 'Yoga Therapy', 'FRCms']),
                'years_experience' => 8,
                'biography' => 'Especialista en yoga para atletas y rehabilitación. Combina movimiento funcional con respiración y mindfulness.',
                'image_url' => 'https://images.unsplash.com/photo-1599901860904-17e6ed7083a0?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'name' => 'Javier Ruiz',
                'specialty' => 'Boxeo y Acondicionamiento Combate',
                'certifications' => json_encode(['AIBA Coach', 'CrossFit L2', 'FMS']),
                'years_experience' => 11,
                'biography' => 'Ex-boxeador profesional. Entrena tanto boxeadores competitivos como clientes que buscan acondicionamiento tipo combate.',
                'image_url' => 'https://images.unsplash.com/flagged/photo-1574005280900-3ff489fa1f70?auto=format&fit=crop&w=800&q=80',
            ],
        ];

        foreach ($trainers as $sortOrder => $trainer) {
            Trainer::updateOrCreate(
                ['name' => $trainer['name']],
                [...$trainer, 'is_active' => true, 'sort_order' => $sortOrder + 1],
            );
        }
    }
}
