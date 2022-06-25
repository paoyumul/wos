<template>
    <nav class="bg-white py-3 text-md text-gray-900 shadow-sm">
        <div class="container flex items-center">
            <Link class="text-lg mr-4 whitespace-nowrap font-semibold" href="/">
                WOS Dental Clinic
            </Link>

            <div class="w-full flex align-item-center justify-between" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="flex">
                    <template v-if="user">
                        <li class="mr-4">
                            <Link href="/admin/users">Users</Link>
                        </li>
                        <li class="mr-4">
                            <Link href="/admin/services">Services</Link>
                        </li>
                        <li class="mr-4">
                            <Link href="/admin/schedules">Schedules</Link>
                        </li>
                        <li class="mr-4">
                            <Link href="/admin/appointments">Appointments</Link>
                        </li>
                    </template>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="flex">
                    <!-- Authentication Links -->
                    <template v-if="!user">
                        <li class="ml-4">
                            <Link :href="$route('login')">Login</Link>
                        </li>
                        <li class="ml-4">
                            <Link :href="$route('register')">Register</Link>
                        </li>
                    </template>
                    <template v-else>
                        <li class="ml-4 relative">
                            <a
                                id="navbarDropdown"
                                class=""
                                href="#"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >
                                {{ user.name }}
                            </a>

                            <div class="absolute bg-white border border-gray-100 w-full">
                                <button
                                    class="py-1 px-2"
                                    form="logout-form"
                                >
                                    Logout
                                </button>

                                <form
                                    id="logout-form"
                                    class="d-none"
                                    @submit.prevent="form.post('/logout')"
                                >
                                </form>
                            </div>
                        </li>
                    </template>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { computed } from 'vue';
import { Link, usePage, useForm } from '@inertiajs/inertia-vue3';

const user = computed(() => usePage().props.value.auth.user);
const form = useForm({
    _token: usePage().props.value.csrf_token,
});
</script>
