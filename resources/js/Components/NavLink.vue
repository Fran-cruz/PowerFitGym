<script setup>
import { computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'

defineOptions({ name: 'NavLink' })

const props = defineProps({
    to: { type: String, required: true },
    label: { type: String, required: true },
})

const page = usePage()
const isActive = computed(() => (
    page.url === props.to || (props.to !== '/' && page.url.startsWith(props.to))
))
</script>

<template>
    <Link :href="to" class="navbar-item pf-nav-link" :class="{ 'is-current': isActive }">
        {{ label }}
    </Link>
</template>

