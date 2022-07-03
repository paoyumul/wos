<template>
    <div class="page">
        <app-header></app-header>
        <div class="mt-3">
            <div class="container-xl">
                <div class="alert alert-success text-center mt-3" v-if="flashMessage">
                    {{ flashMessage }}
                </div>
                <slot></slot>
            </div>
        </div>
        <footer class="footer footer-transparent d-print-none mt-auto py-3">
            <div class="container">
                <div class="row text-center align-items-center justify-content-center">
                    <ul class="list-inline list-inline-dots mb-0">
                        <li class="list-inline-item">
                            <a
                                href="#"
                                class="link-secondary"
                            >
                                1521 Ma. Clara St. Sta. Cruz, Manila
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a
                                href="#"
                                class="link-secondary"
                            >
                                1532-D Nisus Bldg. A.H. Lacson St. Sta. Cruz, Manila
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a
                                href="tel:89499225"
                                class="link-secondary"
                            >
                                8949-9225
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a
                                href="tel:09276136426"
                                class="link-secondary"
                            >
                                0927-613-6426
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
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
