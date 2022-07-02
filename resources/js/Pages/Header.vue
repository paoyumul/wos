<template>
    <div class="sticky top-0">
        <header class="bg-white border-b border-gray-100 text-md text-gray-900 h-9">
            <div class="container h-full flex items-center justify-between">
                <button
                    class="navbar-toggler hidden"
                    type="button"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="flex">
                    <a href="#" class="text-lg mr-4 whitespace-nowrap font-semibold">
                        WOS Dental Clinic
                    </a>
                    <ul class="flex">
                        <li class="nav-item">
                            <Link class="px-2 text-sm font-medium" href="/admin">
                                Home
                            </Link>
                        </li>
                        <li class="nav-item">
                            <Link class="px-2 text-sm font-medium" :href="$route('admin.users.index')">
                                Users
                            </Link>
                        </li>
                        <li class="nav-item">
                            <Link class="px-2 text-sm font-medium" :href="$route('admin.services.index')">
                                Services
                            </Link>
                        </li>
                        <li class="nav-item">
                            <Link class="px-2 text-sm font-medium" :href="$route('admin.schedules.index')">
                                Schedules
                            </Link>
                        </li>
                        <li class="nav-item">
                            <Link class="px-2 text-sm font-medium" :href="$route('admin.appointments.index')">
                                Appointments
                            </Link>
                        </li>
                        <li class="nav-item">
                            <Link class="px-2 text-sm font-medium" :href="$route('admin.sales.index')">
                                Sales
                            </Link>
                        </li>
                    </ul>
                </div>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="relative">
                        <a
                            href="#"
                            @click.prevent="showDropdown = !showDropdown"
                        >
                            <div>
                                <div class="leading-none">{{ user.first_name }} {{ user.last_name }}</div>
                                <div class="mt-0.5 text-xs">{{ user.role }}</div>
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
                            <div
                                v-show="showDropdown"
                                class="origin-top-right absolute right-0 mt-2 w-20 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                            >
                                <div class="py-1">
                                    <a href="#" class="text-gray-700 block px-2 py-1 text-sm">
                                        Profile &amp; account
                                    </a>
                                    <Link
                                        :href="$route('logout')"
                                        class="text-gray-700 block px-2 py-1 text-sm"
                                        as="button"
                                        method="post"
                                    >
                                        Logout
                                    </Link>
                                </div>
                            </div>
                        </transition>
                    </div>
                </div>
            </div>
        </header>
    </div>
</template>

<script setup>
import { computed, ref } from 'vue';
import { Link, usePage, useForm } from '@inertiajs/inertia-vue3';

const user = computed(() => usePage().props.value.auth.user);
const form = useForm({
    _token: usePage().props.value.csrf_token,
});
const showDropdown = ref(false);
</script>
