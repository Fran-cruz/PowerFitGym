<?php

namespace Database\Seeders;

use App\Models\MembershipPlan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MembershipPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Mensual',
                'price' => 899,
                'billing_period' => '/ mes',
                'badge' => 'MÁS POPULAR',
                'badge_type' => 'is-popular',
                'savings_text' => null,
                'button_text' => 'Empezar ahora',
                'benefits' => json_encode([
                    'Acceso ilimitado a todas las instalaciones',
                    'Clases grupales ilimitadas (Yoga, Spinning, HIIT, Zumba)',
                    'Acceso a zona de pesas libres y máquinas',
                    'Vestidores con duchas y lockers',
                    'App móvil para reservar clases',
                    'Asesoría nutricional básica mensual',
                ]),
            ],
            [
                'name' => 'Trimestral',
                'price' => 2499,
                'billing_period' => '/ 3 meses',
                'badge' => 'AHORRA 7%',
                'badge_type' => 'is-saving',
                'savings_text' => 'Ahorra 7% vs mensual',
                'button_text' => 'Elegir este plan',
                'benefits' => json_encode([
                    'Todo lo del plan mensual',
                    '1 sesión de evaluación física inicial',
                    'Plan de entrenamiento personalizado (actualizado mensual)',
                    'Acceso prioritario a clases con cupo limitado',
                    '1 invitado gratis al mes',
                    'Descuento 10% en suplementos en tienda',
                ]),
            ],
            [
                'name' => 'Anual',
                'price' => 8999,
                'billing_period' => '/ año',
                'badge' => 'MEJOR VALOR',
                'badge_type' => 'is-best',
                'savings_text' => 'Ahorra 17% + 2 meses gratis',
                'button_text' => 'Obtener mejor oferta',
                'benefits' => json_encode([
                    'Todo lo del plan trimestral',
                    '12 meses por el precio de 10 (2 meses gratis)',
                    '4 sesiones de entrenamiento personal al año',
                    'Plan nutricional completo personalizado',
                    'Acceso 24/7 con llave magnética',
                    '1 invitado por visita, visitas ilimitadas',
                    'Descuento 20% en suplementos y merch',
                    'Entrenador dedicado para consultas por WhatsApp',
                    'Acceso a eventos exclusivos para miembros anuales',
                ]),
            ],
        ];

        foreach ($plans as $sortOrder => $plan) {
            MembershipPlan::updateOrCreate(
                ['name' => $plan['name']],
                [...$plan, 'is_featured' => $plan['name'] === 'Mensual', 'is_active' => true, 'sort_order' => $sortOrder + 1],
            );
        }
    }
}
