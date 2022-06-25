<template>
    <div class="pagination-container d-flex align-items-center justify-content-between mt-2">
        <p class="pagination-meta mb-0">
            Showing
            <span>{{ props.paginator.from }} to {{ props.paginator.to }}</span>
            of
            <span>{{ props.paginator.total }}</span>
            records
        </p>
        <ul class="pagination mb-0">
            <li
                class="page-item"
                :class="{
                    active: props.paginator.current_page === link.label,
                    disabled: (onFirstPage && link.label === 'Previous') || (!hasMorePages && link.label === 'Next'),
                }"
                v-for="link in props.paginator.links"
            >
                <Link class="page-link" :href="link.url">
                    {{ link.label }}
                </Link>
            </li>
        </ul>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import { computed } from 'vue';

const props = defineProps({
    paginator: {
        type: Object,
        required: true,
    },
});

const onFirstPage = computed(() => {
    return props.paginator.current_page === 1;
});

const hasMorePages = computed(() => {
    return props.paginator.current_page < props.paginator.last_page;
});
</script>
