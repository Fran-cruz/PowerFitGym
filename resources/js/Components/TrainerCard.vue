<script setup>
defineProps({
    entrenador: {
        type: Object,
        required: true
    }
});
</script>

<template>
    <div class="column is-6 is-3-desktop">
        <article class="card has-background-pf-gray-50">
            <div class="card-image">
                <figure class="image is-1by1">
                    <img :src="entrenador.imagen" :alt="entrenador.nombre" />
                </figure>
            </div>
            <div class="card-content has-text-centered">
                <div class="content">
                    <p class="title is-4 has-text-pf-black">{{ entrenador.nombre }}</p>
                    <p class="subtitle is-6 has-text-pf-orange">
                        <span class="tag is-pf-orange is-light">{{ entrenador.especialidad }}</span>
                    </p>
                    <p class="is-size-7 has-text-pf-gray mb-3">{{ entrenador.experiencia }} de experiencia</p>
                    
                    <div class="tags has-addons is-centered mb-4">
                        <span v-for="cert in entrenador.certificaciones" :key="cert" class="tag is-pf-gray-light is-small">
                            {{ cert }}
                        </span>
                    </div>

                    <p class="is-size-7 has-text-pf-gray-dark">{{ entrenador.bio }}</p>
                </div>
            </div>
            <footer class="card-footer">
                <a class="card-footer-item button is-pf-black is-outlined is-fullwidth is-small">Ver Perfil</a>
            </footer>
        </article>
    </div>
</template>