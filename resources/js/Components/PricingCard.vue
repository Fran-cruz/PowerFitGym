<script setup>
defineProps({
    plan: {
        type: Object,
        required: true
    },
    popular: {
        type: Boolean,
        default: false
    },
    badgeText: {
        type: String,
        default: ''
    },
    badgeClass: {
        type: String,
        default: 'is-warning has-text-black'
    },
    ctaText: {
        type: String,
        required: true
    },
    ctaClass: {
        type: String,
        required: true
    }
});
</script>

<template>
    <div class="column is-4">
        <article class="card has-background-pf-gray-50" :class="{ 'is-shadow-lg': popular }">
            <!-- Popular Badge -->
            <div v-if="plan.badge || popular || badgeText" class="card-header has-background-pf-gray-50" style="border-bottom: none; padding-top: 1rem;">
                <div class="card-header-title has-text-centered">
                    <span :class="['tag', badgeClass, 'is-medium']" v-if="plan.badge || badgeText">
                        {{ plan.badge || badgeText }}
                    </span>
                    <span v-else class="tag is-warning has-text-black is-medium">MÁS POPULAR</span>
                </div>
            </div>

            <div class="card-content has-text-centered">
                <div class="content">
                    <h3 class="title is-3 has-text-pf-black mb-2">{{ plan.nombre }}</h3>
                    <div class="has-text-centered mb-4">
                        <span class="title is-1 has-text-pf-black">{{ plan.precio }}</span>
                        <span class="subtitle is-5 has-text-pf-gray">{{ plan.periodo }}</span>
                    </div>

                    <ul class="mt-4 has-text-left">
                        <li v-for="(beneficio, index) in plan.beneficios" :key="index" class="mb-3">
                            <span class="icon-text">
                                <span class="icon has-text-pf-orange">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="has-text-pf-gray-dark">{{ beneficio }}</span>
                            </span>
                        </li>
                    </ul>
                </div>

                <div class="has-text-centered mt-5">
                    <button type="button" :class="['button', ctaClass]">
                        {{ ctaText }}
                    </button>
                </div>
            </div>
        </article>
    </div>
</template>
