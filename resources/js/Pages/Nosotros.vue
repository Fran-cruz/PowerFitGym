<script setup>
import { Head, Link } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const valores = [
    {
        icono: "mdi-heart-pulse",
        titulo: "Bienestar Integral",
        descripcion: "No solo entrenamos el cuerpo, cultivamos la mente. Salud física, mental y emocional van de la mano."
    },
    {
        icono: "mdi-chart-line",
        titulo: "Disciplina Progresiva",
        descripcion: "Los resultados duraderos vienen de la constancia. Te enseñamos a construir hábitos, no soluciones rápidas."
    },
    {
        icono: "mdi-handshake-outline",
        titulo: "Acompañamiento Real",
        descripcion: "Nunca entrenas solo. Nuestro equipo te guía, corrige y motiva en cada paso de tu camino."
    }
]
</script>

<template>
    <Head title="Nosotros - PowerFitGym" />

    <GuestLayout>
        <section id="nosotros" class="section pf-page-section page-ambient-background">
            <div class="container pf-container">
                <header class="pf-section-header">
                    <h1 class="title pf-section-title">Nuestra Filosofía</h1>
                    <p class="subtitle pf-section-subtitle">Más que un gimnasio, somos una comunidad comprometida con tu bienestar integral</p>
                </header>

                <div class="columns is-multiline pf-columns">
                    <div v-for="valor in valores" :key="valor.titulo" class="column is-12-mobile is-4-tablet">
                        <article class="box pf-feature-card">
                            <span class="pf-icon-circle"><i :class="['mdi', valor.icono]"></i></span>
                            <h2 class="title is-5">{{ valor.titulo }}</h2>
                            <p>{{ valor.descripcion }}</p>
                        </article>
                    </div>
                </div>

                <div class="columns is-multiline is-vcentered pf-story-section">
                    <div class="column is-12-mobile is-12-tablet is-6-desktop">
                        <h2 class="title is-3 has-text-white mb-5">Nuestra Historia</h2>
                        <div class="content pf-story-copy">
                            <p>PowerFit Gym nació en 2018 con una visión clara: crear un espacio donde el entrenamiento de calidad fuera accesible para todos, sin importar su nivel de experiencia.</p>
                            <p>Lo que comenzó como un pequeño local con equipamiento básico, hoy es un referente de la ciudad con 500m², equipamiento de última generación y un equipo de 7 profesionales certificados.</p>
                            <p>Hemos ayudado a más de 2,000 personas a transformar su vida a través del ejercicio. Cada historia de superación nos recuerda por qué empezamos.</p>
                        </div>
                    </div>

                    <div class="column is-12-mobile is-12-tablet is-6-desktop">
                        <figure class="pf-story-image">
                            <img
                                src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=800&q=80"
                                alt="PowerFit Gym interior"
                            />
                            <span class="pf-story-overlay"></span>
                            <figcaption>"Tu mejor versión empieza hoy"</figcaption>
                        </figure>
                    </div>
                </div>

                <div class="columns is-mobile is-multiline pf-columns has-text-centered">
                    <div class="column is-6-mobile is-3-tablet">
                        <article class="pf-panel pf-stat-panel"><p class="pf-stat-number">2,000+</p><p class="pf-stat-label">Vidas transformadas</p></article>
                    </div>
                    <div class="column is-6-mobile is-3-tablet">
                        <article class="pf-panel pf-stat-panel"><p class="pf-stat-number">7</p><p class="pf-stat-label">Entrenadores certificados</p></article>
                    </div>
                    <div class="column is-6-mobile is-3-tablet">
                        <article class="pf-panel pf-stat-panel"><p class="pf-stat-number">500m²</p><p class="pf-stat-label">Instalaciones premium</p></article>
                    </div>
                    <div class="column is-6-mobile is-3-tablet">
                        <article class="pf-panel pf-stat-panel"><p class="pf-stat-number">50+</p><p class="pf-stat-label">Clases semanales</p></article>
                    </div>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>

