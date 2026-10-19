<script setup>
import { Head } from '@inertiajs/vue3'
import GuestLayout from '@/Layouts/GuestLayout.vue'

// areas del gimnasio y su equipamiento.
const areas = [
    {
        titulo: 'Musculación',
        descripcion: 'Zona de pesas libres y máquinas',
        imagen: 'https://images.unsplash.com/photo-1583454110551-21f2fa2afe61?w=800&q=80',
        equipamiento: ['Mancuernas 2-50kg', 'Barras olímpicas y discos', 'Racks de sentadilla', 'Máquinas selectorizadas']
    },
    {
        titulo: 'Cardio',
        descripcion: 'Equipos de última generación',
        imagen: 'https://images.unsplash.com/photo-1571902943202-507ec2618e8f?w=800&q=80',
        equipamiento: ['Cintas de correr', 'Elípticas y bicicletas', 'Remos Concept2', 'Escaladoras y Air Bikes']
    },
    {
        titulo: 'Funcional',
        descripcion: 'Espacio abierto y versátil',
        imagen: 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=800&q=80',
        equipamiento: ['Kettlebells', 'Medicine balls & Wall balls', 'Battle ropes & Sleds', 'Plyo boxes & Anillas']
    },
    {
        titulo: 'Clases Grupales',
        descripcion: 'Más de 50 clases/semana',
        imagen: 'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?w=800&q=80',
        equipamiento: ['HIIT & Cross Training', 'Yoga & Mobility', 'Spinning & RPM', 'Zumba & Body Combat']
    }
]

// horario resumido de clases grupales.
const horario = [
    { hora: '06:00', lunes: 'Spinning', martes: 'HIIT', miercoles: 'Spinning', jueves: 'HIIT', viernes: 'Spinning', sabado: 'Yoga' },
    { hora: '09:00', lunes: 'Body Pump', martes: 'Yoga', miercoles: 'Body Pump', jueves: 'Yoga', viernes: 'Body Pump', sabado: 'Cross Training' },
    { hora: '18:00', lunes: 'Cross Training', martes: 'Zumba', miercoles: 'Cross Training', jueves: 'Zumba', viernes: 'HIIT', sabado: '-' },
    { hora: '19:30', lunes: 'Yoga', martes: 'Body Combat', miercoles: 'Yoga', jueves: 'Body Combat', viernes: 'Stretch', sabado: '-' }
]
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

