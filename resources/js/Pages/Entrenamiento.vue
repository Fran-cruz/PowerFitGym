<script setup>
import { Head } from '@inertiajs/vue3'
import GuestLayout from '@/Layouts/GuestLayout.vue'

const props = defineProps({
    areas: {
        type: Array,
        default: () => [],
    },
    horario: {
        type: Array,
        default: () => [],
    },
})

const areas = props.areas
const horario = props.horario
</script>

<template>
    <Head title="Entrenamiento - PowerFitGym" />

    <GuestLayout>
        <section id="entrenamiento" class="section pf-page-section page-ambient-background">
            <div class="container pf-container">
                <header class="pf-section-header">
                    <h1 class="title pf-section-title">Áreas de Entrenamiento</h1>
                    <p class="subtitle pf-section-subtitle">Instalaciones especializadas para cada tipo de objetivo fitness</p>
                </header>

                <!-- tarjetas con imagen de fondo para cada area. -->
                <div class="columns is-multiline pf-columns">
                    <div v-for="area in areas" :key="area.titulo" class="column is-12-mobile is-6-tablet is-3-desktop">
                        <article class="pf-cover-card pf-training-card">
                            <div class="pf-cover-card-image pf-training-image">
                                <img :src="area.imagen" :alt="area.titulo" />
                            </div>
                            <div class="pf-cover-card-overlay"></div>
                            <div class="pf-cover-card-content">
                                <h2 class="title is-4">{{ area.titulo }}</h2>
                                <p class="subtitle is-7">{{ area.descripcion }}</p>
                                <ul class="pf-bullet-list">
                                    <li v-for="item in area.equipamiento" :key="item">
                                        <span class="pf-bullet"></span>
                                        <span>{{ item }}</span>
                                    </li>
                                </ul>
                            </div>
                        </article>
                    </div>
                </div>

                <!-- tabla de horarios destacados. -->
                <section class="mt-6">
                    <h2 class="title is-4 has-text-white has-text-centered mb-5">Horario de Clases Destacadas</h2>
                    <div class="table-container pf-table-wrap">
                        <table class="table is-fullwidth pf-table">
                            <thead>
                                <tr>
                                    <th>Hora</th>
                                    <th>Lunes</th>
                                    <th>Martes</th>
                                    <th>Miércoles</th>
                                    <th>Jueves</th>
                                    <th>Viernes</th>
                                    <th>Sábado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="clase in horario" :key="clase.hora">
                                    <td>{{ clase.hora }}</td>
                                    <td>{{ clase.lunes }}</td>
                                    <td>{{ clase.martes }}</td>
                                    <td>{{ clase.miercoles }}</td>
                                    <td>{{ clase.jueves }}</td>
                                    <td>{{ clase.viernes }}</td>
                                    <td>{{ clase.sabado }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </section>
    </GuestLayout>
</template>

