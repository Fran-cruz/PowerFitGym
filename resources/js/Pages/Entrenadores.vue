<script setup>
import { Head, Link } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { ref, onMounted, onUnmounted, computed, nextTick } from 'vue';

const props = defineProps({
    entrenadores: {
        type: Array,
        default: () => [],
    },
});

const entrenadores = props.entrenadores;

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

