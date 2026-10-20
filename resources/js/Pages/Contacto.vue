<script setup>
import { Head, useForm } from '@inertiajs/vue3'
import GuestLayout from '@/Layouts/GuestLayout.vue'
import { nextTick, onBeforeUnmount, onMounted, ref } from 'vue'
import 'leaflet/dist/leaflet.css'

// estado visual del formulario y referencia para montar el mapa.
const mensajeEnviado = ref(false)
const mapaContenedor = ref(null)

// ubicacion de unicah, campus san isidro, en la ceiba.
const coordenadasCampus = [15.76667, -86.80047]
let mapa = null
let feedbackTimer = null

const formulario = useForm({
    name: '',
    email: '',
    phone: '',
    subject: '',
    message: ''
})

// horarios mostrados en la informacion de contacto.
const horarios = [
    'Lunes - Viernes: 5:00 AM - 11:00 PM',
    'Sábados: 7:00 AM - 9:00 PM',
    'Domingos: 8:00 AM - 6:00 PM',
    'Días festivos: 8:00 AM - 2:00 PM'
]

const enviarFormulario = () => {
    // guardar el mensaje y mostrar confirmacion cuando termina correctamente.
    formulario.post(route('contacto.store'), {
        preserveScroll: true,
        onSuccess: () => {
            formulario.reset()
            mensajeEnviado.value = true

            clearTimeout(feedbackTimer)
            feedbackTimer = setTimeout(() => {
                mensajeEnviado.value = false
            }, 5000)
        },
    })
}

onMounted(async () => {
    await nextTick()

    // cargar leaflet solo cuando el mapa va a mostrarse.
    const leafletModule = await import('leaflet')
    const L = leafletModule.default ?? leafletModule

    mapa = L.map(mapaContenedor.value, {
        scrollWheelZoom: false,
    }).setView(coordenadasCampus, 17)

    // capa de mapa gratuita de openstreetmap.
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    }).addTo(mapa)

    // marcador personalizado con un icono de mdi.
    const iconoCampus = L.divIcon({
        className: 'marcador-campus',
        html: '<span class="mdi mdi-map-marker"></span>',
        iconSize: [48, 48],
        iconAnchor: [24, 44],
        popupAnchor: [0, -42],
    })

    L.marker(coordenadasCampus, {
        icon: iconoCampus,
        title: 'Universidad Católica de Honduras - Campus San Isidro',
        alt: 'Ubicación de la Universidad Católica de Honduras - Campus San Isidro',
    })
        .addTo(mapa)
        .bindPopup(`
            <strong>Universidad Católica de Honduras</strong><br>
            Campus San Isidro<br>
            La Ceiba, Atlántida, Honduras
        `)
        .openPopup()
})

onBeforeUnmount(() => {
    // liberar el temporizador y la instancia del mapa.
    clearTimeout(feedbackTimer)
    mapa?.remove()
    mapa = null
})
</script>

<template>
    <Head title="Contacto - PowerFitGym" />

    <GuestLayout>
        <section id="contacto" class="section pf-page-section page-ambient-background">
            <div class="container pf-container">
                <header class="pf-section-header">
                    <h1 class="title pf-section-title">Contacto</h1>
                    <p class="subtitle pf-section-subtitle">¿Listo para empezar? Estamos aquí para ayudarte</p>
                </header>

                <!-- datos de contacto y formulario visual. -->
                <div class="columns is-multiline pf-columns">
                    <div class="column is-12-mobile is-12-tablet is-6-desktop">
                        <article class="box pf-panel">
                            <h2 class="title is-4 has-text-white mb-5">Información de Contacto</h2>

                            <div class="pf-contact-list">
                                <div class="media pf-contact-item">
                                    <div class="media-left"><span class="pf-icon-circle"><i class="mdi mdi-map-marker-outline"></i></span></div>
                                    <div class="media-content">
                                        <h3 class="has-text-white has-text-weight-semibold mb-1">Ubicación</h3>
                                        <p class="pf-muted-text">Colonia Las Colinas, La Ceiba, Atlántida, Honduras</p>
                                    </div>
                                </div>

                                <div class="media pf-contact-item">
                                    <div class="media-left"><span class="pf-icon-circle"><i class="mdi mdi-phone-outline"></i></span></div>
                                    <div class="media-content">
                                        <h3 class="has-text-white has-text-weight-semibold mb-1">Teléfono</h3>
                                        <a href="tel:+50499991007" class="pf-orange-light-text">+504 9999-1007</a>
                                    </div>
                                </div>

                                <div class="media pf-contact-item">
                                    <div class="media-left"><span class="pf-icon-circle"><i class="mdi mdi-email-outline"></i></span></div>
                                    <div class="media-content">
                                        <h3 class="has-text-white has-text-weight-semibold mb-1">Correo Electrónico</h3>
                                        <a href="mailto:info@powerfitgym.com" class="pf-orange-light-text">info@powerfitgym.com</a>
                                    </div>
                                </div>

                                <div class="media pf-contact-item">
                                    <div class="media-left"><span class="pf-icon-circle"><i class="mdi mdi-clock-outline"></i></span></div>
                                    <div class="media-content">
                                        <h3 class="has-text-white has-text-weight-semibold mb-1">Horarios de Atención</h3>
                                        <ul class="pf-muted-text">
                                            <li v-for="item in horarios" :key="item">{{ item }}</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="media pf-contact-item">
                                    <div class="media-left"><span class="pf-icon-circle"><i class="mdi mdi-account"></i></span></div>

                                    <div class="media-content">
                                        <h2 class="has-text-white has-text-weight-semibold mb-1">Síguenos</h2>
                                        <div class="buttons">
                                            <a class="button pf-social-button" href="https://www.instagram.com/frannn.cruz_/" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                                                <span class="icon"><i class="mdi mdi-instagram"></i></span>
                                            </a>
                                            <a class="button pf-social-button" href="https://www.francruz.tech/" target="_blank" rel="noopener noreferrer" aria-label="Sitio web">
                                                <span class="icon"><i class="mdi mdi-web"></i></span>
                                            </a>
                                            <a class="button pf-social-button" href="https://www.youtube.com/watch?v=8RFbx4lK-Qs" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                                                <span class="icon"><i class="mdi mdi-youtube"></i></span>
                                            </a>
                                            <a class="button pf-social-button" href="https://github.com/Fran-cruz/PowerFitGym" target="_blank" rel="noopener noreferrer" aria-label="GitHub">
                                                <span class="icon"><i class="mdi mdi-github"></i></span>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="column is-12-mobile is-12-tablet is-6-desktop">
                        <article class="box pf-panel">
                            <h2 class="title is-4 has-text-white mb-5">Envíanos un Mensaje</h2>
                            <!-- envia el mensaje a la base de datos. -->
                            <form class="pf-form" @submit.prevent="enviarFormulario">
                                <div class="columns is-multiline">
                                    <div class="column is-12-mobile is-6-tablet">
                                        <div class="field">
                                            <label class="label" for="nombre">Nombre completo</label>
                                            <div class="control">
                                                <input id="nombre" v-model="formulario.name" class="input" type="text" required placeholder="Juan Pérez" />
                                            </div>
                                            <p v-if="formulario.errors.name" class="help is-danger">{{ formulario.errors.name }}</p>
                                        </div>
                                    </div>
                                    <div class="column is-12-mobile is-6-tablet">
                                        <div class="field">
                                            <label class="label" for="email">Correo electrónico</label>
                                            <div class="control">
                                                <input id="email" v-model="formulario.email" class="input" type="email" required placeholder="juan@ejemplo.com" />
                                            </div>
                                            <p v-if="formulario.errors.email" class="help is-danger">{{ formulario.errors.email }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="field">
                                    <label class="label" for="telefono">Teléfono (opcional)</label>
                                    <div class="control">
                                        <input id="telefono" v-model="formulario.phone" class="input" type="tel" placeholder="+504 XXXX XXXX" />
                                    </div>
                                    <p v-if="formulario.errors.phone" class="help is-danger">{{ formulario.errors.phone }}</p>
                                </div>

                                <div class="field">
                                    <label class="label" for="asunto">Asunto</label>
                                    <div class="control">
                                        <div class="select is-fullwidth">
                                            <select id="asunto" v-model="formulario.subject" required>
                                                <option value="" disabled>Selecciona un tema</option>
                                                <option value="membresias">Información sobre membresías</option>
                                                <option value="entrenador">Contratar entrenador personal</option>
                                                <option value="clases">Horarios de clases grupales</option>
                                                <option value="instalaciones">Visita a instalaciones</option>
                                                <option value="otro">Otro</option>
                                            </select>
                                        </div>
                                    </div>
                                    <p v-if="formulario.errors.subject" class="help is-danger">{{ formulario.errors.subject }}</p>
                                </div>

                                <div class="field">
                                    <label class="label" for="mensaje">Mensaje</label>
                                    <div class="control">
                                        <textarea
                                            id="mensaje"
                                            v-model="formulario.message"
                                            class="textarea"
                                            required
                                            rows="5"
                                            placeholder="Cuéntanos qué buscas y cómo podemos ayudarte..."
                                        ></textarea>
                                    </div>
                                    <p v-if="formulario.errors.message" class="help is-danger">{{ formulario.errors.message }}</p>
                                </div>

                                <button type="submit" class="button is-fullwidth pf-button" :class="{ 'is-loading': formulario.processing }" :disabled="formulario.processing">
                                    Enviar Mensaje
                                </button>
                            </form>

                            <div v-if="mensajeEnviado" class="notification pf-notification mt-5">
                                Formulario completado correctamente.
                            </div>
                        </article>
                    </div>
                </div>

                <!-- mapa interactivo con leaflet y openstreetmap. -->
                <div class="">
                    <div class="pf-map-shell">
                        <div
                            ref="mapaContenedor"
                            class="pf-map"
                            role="region"
                            aria-label="Mapa de la Universidad Católica de Honduras, Campus San Isidro, en La Ceiba"
                        ></div>
                    </div>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>

