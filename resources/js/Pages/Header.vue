<template>
    <div class="sticky-top">
        <header class="navbar navbar-expand-md navbar-light sticky-top d-print-none">
            <div class="container-xl">
                <button
                    class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
                    type="button"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href=".">WOS Dental Clinic</a>
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
                                <div class="leading-none">{{ user.first_name }} {{ user.last_name }}</div>
                                <div class="mt-1 small text-muted">{{ user.role }}</div>
                            </div>
                        </a>
                        <transition
                            enter-active-class="transition ease-out duration-100"
                            enter-from-class="transform opacity-0 scale-95"
                            enter-to-class="transform opacity-100 scale-100"
                            leave-active-class="transition ease-in duration-75"
                            leave-from-class="transform opacity-100 scale-100"
                            leave-to-class="transform opacity-0 scale-95"
                        >
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <a :href="$route('profile.edit', user.id)" class="dropdown-item">
                                    Profile &amp; account
                                </a>
                                <Link
                                    :href="$route('logout')"
                                    class="dropdown-item"
                                    as="button"
                                    method="post"
                                >
                                    Logout
                                </Link>
                            </div>
                        </transition>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <div class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="navbar navbar-light">
                <div class="container-xl">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <Link class="nav-link" :href="$route('admin.dashboard')">
                                <span class="nav-link-title">
                                    Home
                                </span>
                            </Link>
                        </li>
                        <li class="nav-item" v-if="isAdmin">
                            <Link class="nav-link" :href="$route('admin.users.index')">
                                <span class="nav-link-title">
                                    Users
                                </span>
                            </Link>
                        </li>
                        <li class="nav-item" v-if="isAdmin">
                            <Link class="nav-link" :href="$route('admin.services.index')">
                                <span class="nav-link-title">
                                    Services
                                </span>
                            </Link>
                        </li>
                        <li class="nav-item" v-if="isAdmin">
                            <Link class="nav-link" :href="$route('admin.schedules.index')">
                                <span class="nav-link-title">
                                    Schedules
                                </span>
                            </Link>
                        </li>
                        <li class="nav-item" v-if="isAdmin">
                            <Link class="nav-link" :href="$route('admin.records.index')">
                                <span class="nav-link-title">
                                    Records
                                </span>
                            </Link>
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link" :href="$route('admin.appointments.index')">
                                <span class="nav-link-title">
                                    Appointments
                                </span>
                            </Link>
                        </li>
                        <li class="nav-item" v-if="isAdmin">
                            <Link class="nav-link" :href="$route('admin.sales.index')">
                                <span class="nav-link-title">
                                    Sales
                                </span>
                            </Link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed } from 'vue';
import { Link, usePage, useForm } from '@inertiajs/inertia-vue3';

const user = computed(() => usePage().props.value.auth.user);
const isAdmin = user.value.role === 'Admin';

const form = useForm({
    _token: usePage().props.value.csrf_token,
});
</script>
