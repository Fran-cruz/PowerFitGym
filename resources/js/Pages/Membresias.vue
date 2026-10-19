<script setup>
import { Head } from '@inertiajs/vue3'
import GuestLayout from '@/Layouts/GuestLayout.vue'

// planes informativos; los botones no envian solicitudes todavia.
const planes = [
    {
        nombre: 'Mensual',
        precio: 'L899',
        periodo: '/ mes',
        badge: 'MÁS POPULAR',
        badgeType: 'is-popular',
        boton: 'Empezar ahora',
        beneficios: [
            'Acceso ilimitado a todas las instalaciones',
            'Clases grupales ilimitadas (Yoga, Spinning, HIIT, Zumba)',
            'Acceso a zona de pesas libres y máquinas',
            'Vestidores con duchas y lockers',
            'App móvil para reservar clases',
            'Asesoría nutricional básica mensual'
        ]
    },
    {
        nombre: 'Trimestral',
        precio: 'L2,499',
        periodo: '/ 3 meses',
        badge: 'AHORRA 7%',
        badgeType: 'is-saving',
        ahorro: 'Ahorra 7% vs mensual',
        boton: 'Elegir este plan',
        beneficios: [
            'Todo lo del plan mensual',
            '1 sesión de evaluación física inicial',
            'Plan de entrenamiento personalizado (actualizado mensual)',
            'Acceso prioritario a clases con cupo limitado',
            '1 invitado gratis al mes',
            'Descuento 10% en suplementos en tienda'
        ]
    },
    {
        nombre: 'Anual',
        precio: 'L8,999',
        periodo: '/ año',
        badge: 'MEJOR VALOR',
        badgeType: 'is-best',
        ahorro: 'Ahorra 17% + 2 meses gratis',
        boton: 'Obtener mejor oferta',
        beneficios: [
            'Todo lo del plan trimestral',
            '12 meses por el precio de 10 (2 meses gratis)',
            '4 sesiones de entrenamiento personal al año',
            'Plan nutricional completo personalizado',
            'Acceso 24/7 con llave magnética',
            '1 invitado por visita, visitas ilimitadas',
            'Descuento 20% en suplementos y merch',
            'Entrenador dedicado para consultas por WhatsApp',
            'Acceso a eventos exclusivos para miembros anuales'
        ]
    }
]
</script>

<template>
    <Head title="Membresías - PowerFitGym" />

    <GuestLayout>
        <section id="membresias" class="section pf-page-section page-ambient-background">
            <div class="container pf-container">
                <header class="pf-section-header">
                    <h1 class="title pf-section-title">Nuestras Membresías</h1>
                    <p class="subtitle pf-section-subtitle">Elige el plan que mejor se adapte a tus objetivos y ritmo de vida</p>
                </header>

                <!-- tarjetas de precios y beneficios. -->
                <div class="columns is-multiline pf-columns">
                    <div v-for="plan in planes" :key="plan.nombre" class="column is-12-mobile is-4-tablet">
                        <article class="card pf-card pf-pricing-card">
                            <span class="tag pf-plan-badge" :class="plan.badgeType">{{ plan.badge }}</span>

                            <div class="card-content pf-pricing-content">
                                <div class="has-text-centered mb-6">
                                    <h2 class="title is-4 has-text-white mb-2">{{ plan.nombre }}</h2>
                                    <p class="pf-price">
                                        <span>{{ plan.precio }}</span>
                                        <small>{{ plan.periodo }}</small>
                                    </p>
                                    <p v-if="plan.ahorro" class="pf-saving-text">{{ plan.ahorro }}</p>
                                </div>

                                <ul class="pf-benefit-list">
                                    <li v-for="beneficio in plan.beneficios" :key="beneficio">
                                        <span class="icon pf-orange-text"><i class="mdi mdi-check-bold"></i></span>
                                        <span>{{ beneficio }}</span>
                                    </li>
                                </ul>

                                <!-- boton visual para la futura contratacion del plan. -->
                                <button type="button" class="button is-fullwidth pf-button mt-6">
                                    {{ plan.boton }}
                                </button>
                            </div>
                        </article>
                    </div>
                </div>

                <p class="has-text-centered pf-muted-text is-size-7 mt-6">
                    Todos los planes incluyen acceso ilimitado a instalaciones y clases grupales. Sin cuota de inscripción.
                </p>
            </div>
        </section>
    </GuestLayout>
</template>

