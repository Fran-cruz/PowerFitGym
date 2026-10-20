<script setup>
import { Head, Link } from '@inertiajs/vue3'
import GuestLayout from '@/Layouts/GuestLayout.vue'

const props = defineProps({
    caracteristicas: {
        type: Array,
        default: () => [],
    },
})

const caracteristicas = props.caracteristicas

// estadisticas mostradas debajo de los beneficios.
const estadisticas = [
    { numero: '2,000+', etiqueta: 'Vidas transformadas' },
    { numero: '7', etiqueta: 'Entrenadores certificados', blanco: true },
    { numero: '500m²', etiqueta: 'Instalaciones premium' },
    { numero: '50+', etiqueta: 'Clases semanales', blanco: true },
]
</script>

<template>
    <Head title="PowerFitGym - Tu Gimnasio de Confianza" />

    <GuestLayout>
        <!-- portada principal con imagen de fondo. -->
        <section id="inicio" class="pf-hero">
            <div class="pf-hero-background">
                <img
                    src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=1920&q=80"
                    alt="Gimnasio PowerFit"
                />
            </div>
            <div class="pf-hero-overlay"></div>

            <div class="pf-hero-content">
                <h1 class="title pf-hero-title">
                    Supera tus <span class="pf-orange-text">límites</span>
                </h1>
                <p class="subtitle pf-hero-subtitle">
                    El gimnasio más completo de la ciudad. Instalaciones de primer nivel,
                    entrenadores certificados y la comunidad que necesitas para lograr tus objetivos.
                </p>
                <Link :href="route('membresias')" class="button is-large pf-button">
                    Conoce nuestras membresías
                </Link>
            </div>
        </section>

        <!-- beneficios principales del gimnasio. -->
        <section class="section pf-dark-section">
            <div class="container pf-container">
                <header class="pf-section-header">
                    <h2 class="title pf-section-title">¿Por qué elegir <span class="pf-orange-text">PowerFitGym</span>?</h2>
                    <p class="subtitle pf-section-subtitle">Todo lo que necesitas para transformar tu cuerpo y mente</p>
                </header>

                <div class="columns is-multiline pf-columns">
                    <div
                        v-for="item in caracteristicas"
                        :key="item.titulo"
                        class="column is-12-mobile is-6-tablet is-4-desktop"
                    >
                        <article class="box pf-feature-card">
                            <span class="pf-icon-circle"><i :class="['mdi', item.icono]"></i></span>
                            <h3 class="title is-5">{{ item.titulo }}</h3>
                            <p>{{ item.descripcion }}</p>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <!-- estadisticas destacadas. -->
        <section class="section pf-black-section">
            <div class="container pf-container">
                <div class="columns is-mobile is-multiline has-text-centered">
                    <div
                        v-for="stat in estadisticas"
                        :key="stat.etiqueta"
                        class="column is-6-mobile is-3-tablet"
                    >
                        <p class="pf-stat-number" :class="{ 'is-white': stat.blanco }">{{ stat.numero }}</p>
                        <p class="pf-stat-label">{{ stat.etiqueta }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- llamado final para ver las membresias. -->
        <section class="section pf-black-section">
            <div class="container pf-container has-text-centered">
                <h2 class="title pf-section-title">¿Listo para empezar tu transformación?</h2>
                <p class="subtitle pf-section-subtitle mb-6">Únete a más de 2,000 socios que ya confían en PowerFitGym</p>
                <Link :href="route('membresias')" class="button is-large pf-button">
                    <span>Comienza Hoy</span>
                    <span class="icon"><i class="mdi mdi-arrow-right"></i></span>
                </Link>
            </div>
        </section>
    </GuestLayout>
</template>

