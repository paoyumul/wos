<template>
    <div class="sticky-top">
        <header class="navbar navbar-expand-md navbar-light sticky-top d-print-none">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href="." class="keychainify-checked">
                        WOS Dental Clinic
                        <!--<img src="./static/logo.svg" width="110" height="32" alt="Tabler" class="navbar-brand-image">-->
                    </a>
                </h1>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="nav-item dropdown">
                        <a
                            href="#"
                            class="nav-link d-flex lh-1 text-reset p-0"
                            data-bs-toggle="dropdown"
                            aria-label="Open user menu"
                        >
                            <div class="d-none d-xl-block ps-2">
                                <div>{{ user.first_name }} {{ user.last_name }}</div>
                                <div class="mt-1 small text-muted">Admin</div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="#" class="dropdown-item">Profile &amp; account</a>
                            <a href="#" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="navbar-expand-md">
            <div class="collapse navbar-collapse" id="navbar-menu">
                <div class="navbar navbar-light">
                    <div class="container-xl">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <Link class="nav-link" href="/">
                                    <span class="nav-link-title">
                                        Home
                                    </span>
                                </Link>
                            </li>
                            <li class="nav-item">
                                <Link class="nav-link" :href="$route('admin.users.index')">
                                    <span class="nav-link-title">
                                        Users
                                    </span>
                                </Link>
                            </li>
                            <li class="nav-item">
                                <Link class="nav-link" :href="$route('admin.services.index')">
                                    <span class="nav-link-title">
                                        Services
                                    </span>
                                </Link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed } from 'vue';
import { Link, usePage, useForm } from '@inertiajs/inertia-vue3';

const user = computed(() => usePage().props.value.auth.user);
const form = useForm({
    _token: usePage().props.value.csrf_token,
});
</script>
