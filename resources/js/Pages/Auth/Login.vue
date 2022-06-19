<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>

                    <div class="card-body">
                        <form method="POST" @submit.prevent="form.post('/login')">
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                                <div class="col-md-6">
                                    <input
                                        id="email"
                                        type="email"
                                        class="form-control"
                                        :class="{'is-invalid': form.errors.email}"
                                        name="email"
                                        required
                                        autocomplete="email"
                                        autofocus
                                        v-model="form.email"
                                    >
                                    <div v-if="form.errors.email" class="invalid-feedback" role="alert">
                                        {{ form.errors.email }}
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">
                                    Password
                                </label>
                                <div class="col-md-6">
                                    <input
                                        id="password"
                                        type="password"
                                        class="form-control"
                                        :class="{'is-invalid': form.errors.password}"
                                        name="password"
                                        required
                                        autocomplete="current-password"
                                        v-model="form.password"
                                    >
                                    <div v-if="form.errors.password" class="invalid-feedback" role="alert">
                                        {{ form.errors.password }}
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="remember"
                                            id="remember"
                                        >
                                        <label class="form-check-label" for="remember">
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>

                                    <a class="btn btn-link" href="/password-request">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3';

export default {
    setup() {
        const form = useForm({
            _token: document.querySelector('meta[name="csrf-token"]').content,
            email: null,
            password: null,
            remember: false,
        });

        return {form};
    },
};
</script>
