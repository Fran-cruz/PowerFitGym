<script setup>
defineProps({
    valor: {
        type: Object,
        required: true
    }
});
</script>

<template>
    <div class="column is-4">
        <div class="box has-background-pf-gray-50 has-text-centered">
            <div class="icon" style="font-size: 4rem;">{{ valor.icono }}</div>
            <h3 class="title is-3 has-text-pf-black mt-2">{{ valor.titulo }}</h3>
            <p class="has-text-pf-gray-dark mt-2">{{ valor.descripcion }}</p>
        </div>
    </div>
</template>