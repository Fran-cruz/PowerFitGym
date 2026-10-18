<script setup>
import { onMounted, onUnmounted, ref } from 'vue'
import { Link } from '@inertiajs/vue3'
import NavLink from '@/Components/NavLink.vue'

defineOptions({ name: 'GuestLayout' })

const menuAbierto = ref(false)
const scrolled = ref(false)
const handleScroll = () => { scrolled.value = window.scrollY > 20 }

onMounted(() => window.addEventListener('scroll', handleScroll))
onUnmounted(() => window.removeEventListener('scroll', handleScroll))
</script>

<template>
    <div class="pf-site">
        <nav class="navbar pf-navbar" :class="{ 'is-scrolled': scrolled }" aria-label="Navegación principal">
            <div class="container pf-container">
                <div class="navbar-brand">
                    <Link :href="route('inicio')" class="navbar-item pf-brand" @click="menuAbierto = false">
                        <svg class="pf-brand-logo" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                        </svg>
                        <span>PowerFitGym</span>
                    </Link>

                    <button
                        type="button"
                        class="navbar-burger"
                        :class="{ 'is-active': menuAbierto }"
                        :aria-expanded="menuAbierto"
                        aria-label="Abrir menú"
                        @click="menuAbierto = !menuAbierto"
                    >
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </button>
                </div>

                <div class="navbar-menu" :class="{ 'is-active': menuAbierto }">
                    <div class="navbar-end">
                        <NavLink :to="route('inicio')" label="Inicio" @click="menuAbierto = false" />
                        <NavLink :to="route('membresias')" label="Membresías" @click="menuAbierto = false" />
                        <NavLink :to="route('entrenamiento')" label="Entrenamiento" @click="menuAbierto = false" />
                        <NavLink :to="route('entrenadores')" label="Entrenadores" @click="menuAbierto = false" />
                        <NavLink :to="route('instalaciones')" label="Instalaciones" @click="menuAbierto = false" />
                        <NavLink :to="route('nosotros')" label="Nosotros" @click="menuAbierto = false" />
                        <NavLink :to="route('contacto')" label="Contacto" @click="menuAbierto = false" />
                        <div class="navbar-item">
                            <Link :href="route('membresias')" class="button pf-button">Únete Ahora</Link>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <main class="pf-main"><slot /></main>

        <footer class="footer pf-footer">
            <div class="container pf-container">
                <div class="columns is-multiline">
                    <div class="column is-12-mobile is-3-tablet">
                        <Link :href="route('inicio')" class="pf-brand is-flex is-align-items-center mb-4">
                            <svg class="pf-brand-logo" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                            </svg>
                            <span>PowerFitGym</span>
                        </Link>
                        <p class="is-size-7">Tu gimnasio de confianza. Instalaciones premium, entrenadores certificados y una comunidad que te impulsa.</p>
                    </div>

                    <div class="column is-12-mobile is-3-tablet">
                        <h4 class="pf-footer-title">Enlaces Rápidos</h4>
                        <ul class="pf-footer-list is-size-7">
                            <li><Link :href="route('membresias')">Membresías</Link></li>
                            <li><Link :href="route('entrenamiento')">Entrenamiento</Link></li>
                            <li><Link :href="route('entrenadores')">Entrenadores</Link></li>
                            <li><Link :href="route('instalaciones')">Instalaciones</Link></li>
                        </ul>
                    </div>

                    <div class="column is-12-mobile is-3-tablet">
                        <h4 class="pf-footer-title">Legal</h4>
                        <ul class="pf-footer-list is-size-7">
                            <li><a href="#">Términos y Condiciones</a></li>
                            <li><a href="#">Política de Privacidad</a></li>
                            <li><a href="#">Política de Cookies</a></li>
                        </ul>
                    </div>

                    <div class="column is-12-mobile is-3-tablet">
                        <h4 class="pf-footer-title">Contacto</h4>
                        <ul class="pf-footer-list is-size-7">
                            <li>Colonia Las Colinas, La Ceiba, Atlántida, Honduras</li>
                            <li>+504 9999-1007</li>
                            <li>info@powerfitgym.com</li>
                        </ul>
                    </div>
                </div>

                <div class="pf-footer-bottom columns is-vcentered">
                    <div class="column"><p class="is-size-7">© 2026 PowerFitGym. Todos los derechos reservados.</p></div>
                    <div class="column">
                        <div class="pf-footer-social is-size-7">
                            <a href="https://www.instagram.com/frannn.cruz_/" target="_blank" rel="noopener noreferrer">Instagram</a>
                            <a href="https://www.francruz.tech/" target="_blank" rel="noopener noreferrer">Website</a>
                            <a href="https://www.youtube.com/watch?v=8RFbx4lK-Qs" target="_blank" rel="noopener noreferrer">YouTube</a>
                            <a href="https://github.com/Fran-cruz/PowerFitGym" target="_blank" rel="noopener noreferrer">GitHub</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

