<template>
    <div class="page">
        <app-header></app-header>
        <div class="page-wrapper">
            <div class="container-xl">
                <div class="alert alert-success text-center mt-3" v-if="flashMessage">
                    {{ flashMessage }}
                </div>
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script setup>
import AppHeader from './Header';
import { computed } from 'vue';
import { usePage } from '@inertiajs/inertia-vue3';

const flashMessage = computed(() => {
    return usePage().props.value.flash.message;
});
</script>
