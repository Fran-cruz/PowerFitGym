<script setup>
defineProps({
    area: {
        type: Object,
        required: true
    }
});
</script>

<template>
    <div class="column is-6 is-3-desktop">
        <article class="card has-background-pf-gray-50">
            <div class="card-image">
                <figure class="image is-4by3">
                    <img :src="area.imagen" :alt="area.titulo" />
                </figure>
            </div>
            <div class="card-content">
                <div class="media">
                    <div class="media-content">
                        <p class="title is-4 has-text-pf-black">{{ area.titulo }}</p>
                        <p class="subtitle is-6 has-text-pf-gray">{{ area.descripcion }}</p>
                    </div>
                </div>
                <div class="content mt-3">
                    <ul class="has-text-pf-gray-dark">
                        <li v-for="(item, index) in area.equipamiento" :key="index">
                            <span class="icon-text">
                                <span class="icon has-text-pf-orange">
                                    <i class="fas fa-circle" style="font-size: 0.35rem;"></i>
                                </span>
                                <span>{{ item }}</span>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </article>
    </div>
</template>