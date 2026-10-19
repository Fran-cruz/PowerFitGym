<script setup>
import { Head, Link } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { ref, onMounted, onUnmounted, computed, nextTick } from 'vue';

// informacion que se muestra en las tarjetas de entrenadores.
const entrenadores = [
    { nombre: "Carlos Mendoza", especialidad: "Hipertrofia y Fuerza", certificaciones: ["NSCA-CPT", "Fisioterapia Deportiva"], experiencia: "8 años", bio: "Especialista en ganancia de masa muscular y fuerza. Ha competido en fisicoculturismo a nivel nacional y certificado en prevención de lesiones.", imagen: "https://images.unsplash.com/photo-1526506118085-60ce8714f8c5?auto=format&fit=crop&w=800&q=80" },
    { nombre: "Ana Rodríguez", especialidad: "Entrenamiento Funcional y Movilidad", certificaciones: ["CrossFit L2", "FMS", "Animal Flow"], experiencia: "6 años", bio: "Apasionada del movimiento funcional y la movilidad. Certificada en Functional Movement Systems y Animal Flow. Enfoque en calidad de movimiento.", imagen: "https://images.unsplash.com/photo-1548690312-e3b507d8c110?auto=format&fit=crop&w=800&q=80" },
    { nombre: "Roberto Silva", especialidad: "Acondicionamiento Físico y Deportes", certificaciones: ["ACSM-CPT", "Entrenador Deportivo", "Nutrición Deportiva"], experiencia: "10 años", bio: "Ex-atleta de alto rendimiento, ahora entrena deportistas amateurs y profesionales. Enfoque en periodización y rendimiento deportivo.", imagen: "https://images.unsplash.com/photo-1786025054551-072ea2dd349c?auto=format&fit=crop&w=800&q=80" },
    { nombre: "Mariana López", especialidad: "Pérdida de Peso y Recomposición", certificaciones: ["NASM-CPT", "CES", "Nutrición Clínica"], experiencia: "7 años", bio: "Especialista en transformación corporal sostenible. Combina entrenamiento de fuerza con nutrición flexible. Certificada en Corrective Exercise.", imagen: "https://images.unsplash.com/photo-1561402811-8cf986c35eec?auto=format&fit=crop&w=800&q=80" },
    { nombre: "David Chen", especialidad: "Powerlifting y Fuerza Máxima", certificaciones: ["IPF Coach", "Starting Strength Coach"], experiencia: "9 años", bio: "Entrenador de powerlifting competitivo. Sus atletas han batido récords nacionales. Enfoque en técnica perfecta de los tres grandes.", imagen: "https://images.unsplash.com/photo-1550977616-efc580084ac5?auto=format&fit=crop&w=800&q=80" },
    { nombre: "Sofía Herrera", especialidad: "Yoga Terapéutico y Movilidad", certificaciones: ["RYT-500", "Yoga Therapy", "FRCms"], experiencia: "8 años", bio: "Especialista en yoga para atletas y rehabilitación. Combina movimiento funcional con respiración y mindfulness.", imagen: "https://images.unsplash.com/photo-1599901860904-17e6ed7083a0?auto=format&fit=crop&w=800&q=80" },
    { nombre: "Javier Ruiz", especialidad: "Boxeo y Acondicionamiento Combate", certificaciones: ["AIBA Coach", "CrossFit L2", "FMS"], experiencia: "11 años", bio: "Ex-boxeador profesional. Entrena tanto boxeadores competitivos como clientes que buscan acondicionamiento tipo combate.", imagen: "https://images.unsplash.com/flagged/photo-1574005280900-3ff489fa1f70?auto=format&fit=crop&w=800&q=80" }
];

// Cada tarjeta ocupa una fracción exacta del carril, incluido su espaciado.
const itemsPerView = ref(4);
const clonesCount = computed(() => itemsPerView.value);
const infiniteTrainers = computed(() => {
    const n = clonesCount.value;
    return [...entrenadores.slice(-n), ...entrenadores, ...entrenadores.slice(0, n)];
});
const totalReal = entrenadores.length;
const track = ref(null);
const currentIndex = ref(itemsPerView.value);
const isAnimating = ref(false);
const isResetting = ref(false);

// indice del entrenador real, ignorando las tarjetas clonadas.
const activeIndex = computed(() => (
    (currentIndex.value - clonesCount.value + totalReal) % totalReal
));
const SLIDE_INTERVAL = 4000;
let autoSlideTimer = null;
let isHovered = false;
let isFocused = false;
let isMounted = false;

// detener el temporizador antes de crear uno nuevo.
const stopAutoSlide = () => {
    clearTimeout(autoSlideTimer);
    autoSlideTimer = null;
};

const startAutoSlide = () => {
    stopAutoSlide();
    if (!isMounted || isHovered || isFocused) return;
    autoSlideTimer = setTimeout(() => moveSlide(1), SLIDE_INTERVAL);
};

const moveSlide = (direction) => {
    if (isAnimating.value || isResetting.value) return;
    stopAutoSlide();
    isAnimating.value = true;
    currentIndex.value += direction;
};

// Al terminar el movimiento, sustituir los clones por sus originales sin transición.
// Ambos muestran exactamente las mismas tarjetas, por lo que el cambio es invisible.
const resetPosition = async (index = activeIndex.value) => {
    isResetting.value = true;
    isAnimating.value = false;
    currentIndex.value = clonesCount.value + index;
    await nextTick();
    // Aplicar la posición sin animación antes de permitir el siguiente movimiento.
    if (track.value) void track.value.offsetWidth;
    isResetting.value = false;
    startAutoSlide();
};

const finishSlide = (event) => {
    if (event.target !== event.currentTarget || event.propertyName !== 'transform') return;
    if (isAnimating.value) resetPosition();
};

// ajustar cuantas tarjetas se ven segun el ancho de pantalla.
const updateItemsPerView = () => {
    const count = window.innerWidth < 640 ? 1 : window.innerWidth < 1024 ? 2 : 4;
    if (count === itemsPerView.value) return;
    const index = activeIndex.value;
    itemsPerView.value = count;
    resetPosition(index);
};

const pauseAutoSlide = () => { isHovered = true; stopAutoSlide(); };
const resumeAutoSlide = () => { isHovered = false; startAutoSlide(); };
const pauseOnFocus = () => { isFocused = true; stopAutoSlide(); };
const resumeOnBlur = (event) => {
    if (event.currentTarget.contains(event.relatedTarget)) return;
    isFocused = false;
    startAutoSlide();
};

onMounted(() => {
    isMounted = true;
    updateItemsPerView();
    window.addEventListener('resize', updateItemsPerView);
    startAutoSlide();
});

// limpiar el temporizador y el evento al salir de la pagina.
onUnmounted(() => {
    isMounted = false;
    stopAutoSlide();
    window.removeEventListener('resize', updateItemsPerView);
});

const trackStyle = computed(() => ({
    transform: `translateX(-${currentIndex.value * (100 / itemsPerView.value)}%)`,
    transition: isAnimating.value ? 'transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94)' : 'none',
}));

const itemStyle = computed(() => ({
    flex: `0 0 ${100 / itemsPerView.value}%`,
    minWidth: 0
}));
</script>

<template>
    <Head title="Entrenadores - PowerFitGym" />

    <GuestLayout>
        <section id="entrenadores" class="section pf-page-section page-ambient-background">
            <div class="container pf-container">
                <header class="pf-section-header">
                    <h1 class="title pf-section-title">Nuestros Entrenadores</h1>
                    <p class="subtitle pf-section-subtitle">Profesionales certificados apasionados por ayudarte a alcanzar tus metas</p>
                </header>

                <!-- carrusel con controles manuales y movimiento automatico. -->
                <div
                    class="pf-carousel"
                    role="region"
                    aria-roledescription="carrusel"
                    aria-label="Nuestros entrenadores"
                    @mouseenter="pauseAutoSlide"
                    @mouseleave="resumeAutoSlide"
                    @focusin="pauseOnFocus"
                    @focusout="resumeOnBlur"
                    @keydown.left.prevent="moveSlide(-1)"
                    @keydown.right.prevent="moveSlide(1)"
                >
                    <!-- el carril contiene clones para simular un ciclo infinito. -->
                    <div id="entrenadores-carrusel" class="pf-carousel-viewport">
                        <div ref="track" class="pf-carousel-track" :style="trackStyle" @transitionend="finishSlide">
                            <article
                                v-for="(entrenador, idx) in infiniteTrainers"
                                :key="`${entrenador.nombre}-${idx}`"
                                class="pf-carousel-slide"
                                :style="itemStyle"
                                :aria-hidden="idx < currentIndex || idx >= currentIndex + itemsPerView"
                            >
                                <div class="card pf-card pf-trainer-card">
                                    <div class="card-image pf-trainer-image">
                                        <figure class="image">
                                            <img :src="entrenador.imagen" :alt="entrenador.nombre" />
                                        </figure>
                                        <div class="pf-trainer-image-overlay">
                                            <span class="tag pf-specialty-tag">{{ entrenador.especialidad }}</span>
                                        </div>
                                    </div>

                                    <div class="card-content">
                                        <h2 class="title is-5 has-text-white mb-1">{{ entrenador.nombre }}</h2>
                                        <p class="pf-orange-light-text is-size-7 mb-3">{{ entrenador.experiencia }} de experiencia</p>
                                        <div class="tags mb-4">
                                            <span v-for="cert in entrenador.certificaciones" :key="cert" class="tag pf-certification-tag">
                                                {{ cert }}
                                            </span>
                                        </div>
                                        <p class="pf-muted-text is-size-7">{{ entrenador.bio }}</p>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>

                    <!-- control para retroceder una tarjeta. -->
                    <button
                        type="button"
                        aria-label="Ver entrenador anterior"
                        aria-controls="entrenadores-carrusel"
                        class="button pf-carousel-arrow is-previous"
                        @click="moveSlide(-1)"
                    >
                        <span class="icon is-medium"><i class="mdi mdi-chevron-left mdi-24px"></i></span>
                    </button>
                    <!-- control para avanzar una tarjeta. -->
                    <button
                        type="button"
                        aria-label="Ver entrenador siguiente"
                        aria-controls="entrenadores-carrusel"
                        class="button pf-carousel-arrow is-next"
                        @click="moveSlide(1)"
                    >
                        <span class="icon is-medium"><i class="mdi mdi-chevron-right mdi-24px"></i></span>
                    </button>
                </div>

                <div class="has-text-centered pf-trainer-cta">
                    <p class="pf-muted-text mb-5">¿Quieres entrenar con uno de ellos? Todos nuestros planes incluyen acceso a entrenadores.</p>
                    <Link :href="route('membresias')" class="button pf-button">Ver planes y entrenadores</Link>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>

