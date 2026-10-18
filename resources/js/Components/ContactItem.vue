<script setup>
defineProps({
    icono: {
        type: String,
        required: true
    },
    titulo: {
        type: String,
        required: true
    },
    contenido: {
        type: [String, Array],
        required: true
    },
    enlace: {
        type: String,
        default: ''
    },
    esLista: {
        type: Boolean,
        default: false
    }
});
</script>

<template>
    <div class="mb-4">
        <div class="content">
            <p class="has-text-pf-black has-text-weight-medium mb-1">{{ titulo }}</p>
            <template v-if="esLista">
                <ul class="has-text-pf-gray">
                    <li v-for="(item, index) in contenido" :key="index">{{ item }}</li>
                </ul>
            </template>
            <template v-else-if="enlace">
                <p class="has-text-pf-gray">
                    <a :href="enlace" class="has-text-pf-orange has-text-weight-medium">{{ contenido }}</a>
                </p>
            </template>
            <template v-else>
                <p class="has-text-pf-gray">{{ contenido }}</p>
            </template>
        </div>
    </div>
</template>