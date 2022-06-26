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
    <div class="row justify-content-end mt-3" v-if="enableSearchField">
        <div class="col-lg-3">
            <form class="input-icon my-3 my-lg-0" @submit.prevent="form.get($route('admin.users.index'))">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for..." v-model="form.search">
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-secondary">Go</button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { Link, useForm } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';

const props = defineProps({
    enableBackButton: {
        type: Boolean,
        default: true,
    },
    backButtonUrl: {
        type: String,
        default: '#',
    },
    enableSearchField: {
        type: Boolean,
        default: false,
    },
    searchUrl: {
        type: String,
        default: '#',
    }
});

const form = useForm({
    search: '',
});
</script>
