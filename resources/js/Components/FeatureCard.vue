<script setup>
defineProps({
    feature: {
        type: Object,
        required: true
    }
});
</script>

<template>
    <div class="column is-4">
        <div class="box has-text-centered has-background-pf-gray-50">
            <div class="icon" style="font-size: 4rem;">{{ feature.icono }}</div>
            <h3 class="title is-4 has-text-pf-black mt-2">{{ feature.titulo }}</h3>
            <p class="has-text-pf-gray-dark mt-2">{{ feature.descripcion }}</p>
        </div>
    </div>
</template>