<script setup>
defineProps({
    numero: {
        type: String,
        required: true
    },
    label: {
        type: String,
        required: true
    }
});
</script>

<template>
    <div class="column is-3">
        <div class="box has-background-pf-gray-50 has-text-centered">
            <p class="title is-1 has-text-pf-orange">{{ numero }}</p>
            <p class="subtitle is-5 has-text-pf-gray">{{ label }}</p>
        </div>
    </div>
</template>