<script setup>
defineProps({
    instalacion: {
        type: Object,
        required: true
    },
    index: {
        type: Number,
        required: true
    }
});

const columnClass = (index) => {
    // First two items (index 0, 1) are larger on desktop
    if (index < 2) return 'column is-6 is-4-desktop';
    return 'column is-6 is-3-desktop';
}
</script>

<template>
    <div :class="columnClass(index)">
        <article class="card has-background-pf-gray-50">
            <div class="card-image">
                <figure class="image is-4by3">
                    <img :src="instalacion.imagen" :alt="instalacion.titulo" />
                </figure>
            </div>
            <div class="card-content">
                <div class="content has-text-centered">
                    <p class="title is-4 has-text-pf-black">{{ instalacion.titulo }}</p>
                    <p class="subtitle is-6 has-text-pf-gray">{{ instalacion.descripcion }}</p>
                </div>
            </div>
        </article>
    </div>
</template>