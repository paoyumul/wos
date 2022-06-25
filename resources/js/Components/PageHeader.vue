<template>
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    <slot name="pageTitle"></slot>
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-12 col-md-auto ms-auto d-print-none">
                <div class="btn-list">
                    <Link v-if="props.enableBackButton" :href="props.backButtonUrl" class="btn btn-default btn-icon ml-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <line x1="5" y1="12" x2="19" y2="12"></line>
                           <line x1="5" y1="12" x2="9" y2="16"></line>
                           <line x1="5" y1="12" x2="9" y2="8"></line>
                        </svg>
                    </Link>
                    <slot name="actionButtons"></slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
    enableBackButton: {
        type: Boolean,
        default: true,
    },
    backButtonUrl: {
        type: String,
        default: '#',
    },
});
</script>
