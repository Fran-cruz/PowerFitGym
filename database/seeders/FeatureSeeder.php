<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            ['section' => 'home', 'icon' => 'mdi-weight-lifter', 'title' => 'Equipamiento de Primera', 'description' => 'Máquinas de última generación y pesas libres para todos los niveles.'],
            ['section' => 'home', 'icon' => 'mdi-account-tie', 'title' => 'Entrenadores Certificados', 'description' => 'Profesionales que te guían y motivan en cada sesión de entrenamiento.'],
            ['section' => 'home', 'icon' => 'mdi-clock-outline', 'title' => 'Horarios Flexibles', 'description' => 'Abierto de 4:00 AM a 11:00 PM, los 7 días de la semana.'],
            ['section' => 'home', 'icon' => 'mdi-account-group', 'title' => 'Comunidad Activa', 'description' => 'Clases grupales, eventos y una familia que te apoya.'],
            ['section' => 'home', 'icon' => 'mdi-spa-outline', 'title' => 'Zona de Relax', 'description' => 'Sauna, jacuzzi y área de estiramiento para tu recuperación.'],
            ['section' => 'home', 'icon' => 'mdi-food-apple', 'title' => 'Nutrición Personalizada', 'description' => 'Planes alimenticios adaptados a tus objetivos.'],
            ['section' => 'facility', 'icon' => 'mdi-clock-outline', 'title' => 'Abierto 24/7', 'description' => 'Acceso con llave magnética para miembros anuales. Personal en horario extendido.'],
            ['section' => 'facility', 'icon' => 'mdi-car', 'title' => 'Estacionamiento', 'description' => '50 plazas gratuitas vigiladas. Cargadores para vehículos eléctricos.'],
            ['section' => 'facility', 'icon' => 'mdi-wheelchair-accessibility', 'title' => 'Accesibilidad', 'description' => 'Instalaciones 100% adaptadas. Entrenadores especializados en población especial.'],
            ['section' => 'about', 'icon' => 'mdi-heart-pulse', 'title' => 'Bienestar Integral', 'description' => 'No solo entrenamos el cuerpo, cultivamos la mente. Salud física, mental y emocional van de la mano.'],
            ['section' => 'about', 'icon' => 'mdi-chart-line', 'title' => 'Disciplina Progresiva', 'description' => 'Los resultados duraderos vienen de la constancia. Te enseñamos a construir hábitos, no soluciones rápidas.'],
            ['section' => 'about', 'icon' => 'mdi-handshake-outline', 'title' => 'Acompañamiento Real', 'description' => 'Nunca entrenas solo. Nuestro equipo te guía, corrige y motiva en cada paso de tu camino.'],
        ];

        foreach ($features as $sortOrder => $feature) {
            Feature::updateOrCreate(
                ['section' => $feature['section'], 'title' => $feature['title']],
                [...$feature, 'is_active' => true, 'sort_order' => $sortOrder + 1],
            );
        }
    }
}
