<script setup>
import { Head, Link } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const props = defineProps({
    instalaciones: {
        type: Array,
        default: () => [],
    },
    caracteristicas: {
        type: Array,
        default: () => [],
    },
});

const instalaciones = props.instalaciones;
const caracteristicas = props.caracteristicas;
</script>

<template>
    <Head title="Instalaciones - PowerFitGym" />

    <GuestLayout>
        <section id="instalaciones" class="section pf-page-section page-ambient-background">
            <div class="container pf-container">
                <header class="pf-section-header">
                    <h1 class="title pf-section-title">Nuestras Instalaciones</h1>
                    <p class="subtitle pf-section-subtitle">500m² diseñados para tu mejor experiencia de entrenamiento</p>
                </header>

                <!-- galeria de instalaciones con imagenes de fondo. -->
                <div class="pf-facility-grid">
                    <article
                        v-for="(instalacion, index) in instalaciones"
                        :key="instalacion.titulo"
                        class="pf-cover-card pf-facility-card"
                        :class="{ 'is-wide': index < 2, 'is-tall': index === 0 }"
                    >
                        <div class="pf-cover-card-image pf-facility-image">
                            <img :src="instalacion.imagen" :alt="instalacion.titulo" />
                        </div>
                        <div class="pf-cover-card-overlay"></div>
                        <div class="pf-cover-card-content">
                            <h2 class="title is-5">{{ instalacion.titulo }}</h2>
                            <p class="pf-facility-description">{{ instalacion.descripcion }}</p>
                        </div>
                    </article>
                </div>

                <!-- tarjetas de accesibilidad y servicios. -->
                <div class="columns is-multiline pf-columns pf-facility-features">
                    <div v-for="feature in caracteristicas" :key="feature.titulo" class="column is-12-mobile is-4-tablet">
                        <article class="box pf-feature-card">
                            <span class="pf-icon-circle"><i :class="['mdi', feature.icono]"></i></span>
                            <h2 class="title is-5">{{ feature.titulo }}</h2>
                            <p>{{ feature.descripcion }}</p>
                        </article>
                    </div>
                </div>

                <!-- enlace hacia la pagina de contacto para agendar una visita. -->
                <article class="box pf-panel pf-tour-panel">
                    <div class="columns is-vcentered">
                        <div class="column has-text-centered-mobile">
                            <h2 class="title is-4 has-text-white mb-2">¿Quieres verlo por dentro?</h2>
                            <p class="pf-muted-text">Reserva una visita guiada gratuita y descubre todas nuestras instalaciones</p>
                        </div>
                        <div class="column is-narrow has-text-centered">
                            <Link :href="route('contacto')" class="button pf-button">Agendar Visita</Link>
                        </div>
                    </div>
                </article>
            </div>
        </section>
    </GuestLayout>
</template>

