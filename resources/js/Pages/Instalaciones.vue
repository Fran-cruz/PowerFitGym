<script setup>
import { Head, Link } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const instalaciones = [
    {
        titulo: "Zona de Pesas Libres",
        descripcion: "6 racks olímpicos, plataformas de deadlift, mancuernas hasta 50kg",
        imagen: "https://images.unsplash.com/photo-1775993703558-e7afab02b7bd?auto=format&fit=crop&w=1000&q=80"
    },
    {
        titulo: "Zona de Máquinas",
        descripcion: "Circuito completo selectorizado, cable crossover, máquinas Hammer Strength",
        imagen: "https://images.unsplash.com/photo-1571902943202-507ec2618e8f?auto=format&fit=crop&w=1000&q=80"
    },
    {
        titulo: "Studio Clases Grupales",
        descripcion: "2 salas insonorizadas, suelo técnico, sonido profesional, espejos",
        imagen: "https://images.unsplash.com/photo-1524594152303-9fd13543fe6e?auto=format&fit=crop&w=1000&q=80"
    },
    {
        titulo: "Zona Cardio",
        descripcion: "12 cintas, 8 elípticas, 6 remos Concept2, 4 Air Bikes, escaladoras",
        imagen: "https://images.unsplash.com/photo-1775993167571-cd1ff4cadada?auto=format&fit=crop&w=1000&q=80"
    },
    {
        titulo: "Área Funcional",
        descripcion: "300m² césped artificial, rigs, kettlebells, battle ropes, sleds",
        imagen: "https://images.unsplash.com/photo-1758875569136-9936939e6179?auto=format&fit=crop&w=1000&q=80"
    },
    {
        titulo: "Vestidores Premium",
        descripcion: "Lockers inteligentes, duchas de lluvia, sauna, zona de relax",
        imagen: "https://images.unsplash.com/photo-1774876549411-52e4eaff626e?auto=format&fit=crop&w=1000&q=80"
    },
    {
        titulo: "Zona de Recuperación",
        descripcion: "Foam rollers, Theraguns, botas de compresión, camillas de estiramiento",
        imagen: "https://images.unsplash.com/photo-1761284758997-1074f2a33114?auto=format&fit=crop&w=1000&q=80"
    },
    {
        titulo: "Recepción y Lounge",
        descripcion: "WiFi, barra de batidos, zona de trabajo, tienda de suplementos",
        imagen: "https://images.unsplash.com/photo-1777703838688-0080502d919a?auto=format&fit=crop&w=1000&q=80"
    }
]

const caracteristicas = [
    {
        icono: "mdi-clock-outline",
        titulo: "Abierto 24/7",
        descripcion: "Acceso con llave magnética para miembros anuales. Personal en horario extendido."
    },
    {
        icono: "mdi-car",
        titulo: "Estacionamiento",
        descripcion: "50 plazas gratuitas vigiladas. Cargadores para vehículos eléctricos."
    },
    {
        icono: "mdi-wheelchair-accessibility",
        titulo: "Accesibilidad",
        descripcion: "Instalaciones 100% adaptadas. Entrenadores especializados en población especial."
    }
]
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

                <div class="columns is-multiline pf-columns pf-facility-features">
                    <div v-for="feature in caracteristicas" :key="feature.titulo" class="column is-12-mobile is-4-tablet">
                        <article class="box pf-feature-card">
                            <span class="pf-icon-circle"><i :class="['mdi', feature.icono]"></i></span>
                            <h2 class="title is-5">{{ feature.titulo }}</h2>
                            <p>{{ feature.descripcion }}</p>
                        </article>
                    </div>
                </div>

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

