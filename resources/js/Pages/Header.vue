<template>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">
                WOS Dental Clinic
            </a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle Navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    <template v-if="!user">
                        <li class="nav-item">
                            <Link href="/login" class="nav-link">Login</Link>
                        </li>
                        <li class="nav-item">
                            <Link href="/register" class="nav-link">Register</Link>
                        </li>
                    </template>
                    <template v-else>
                        <li class="nav-item dropdown">
                            <a
                                id="navbarDropdown"
                                class="nav-link dropdown-toggle"
                                href="#"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >
                                {{ user.name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a
                                    class="dropdown-item" href="#"
                                    @click.prevent="logout"
                                >
                                    Logout
                                </a>

                                <form
                                    id="logout-form"
                                    method="POST"
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

<script>
import { computed } from 'vue';
import { Link, usePage, useForm } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Link,
    },
    setup() {
        const user = computed(() => usePage().props.value.auth.user);
        const form = useForm({
            _token: document.querySelector('meta[name="csrf-token"]').content,
        });

        function logout() {
            document.getElementById('logout-form').submit();
        }

        return {
            user,
            form,
            logout,
        };
    },
};
</script>
