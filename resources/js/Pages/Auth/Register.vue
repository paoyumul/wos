<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register</div>

                    <div class="card-body">
                        <form method="POST" @submit.prevent="form.post('/register')">
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">
                                    Name
                                </label>

                                <div class="col-md-6">
                                    <input
                                        id="name"
                                        type="text"
                                        class="form-control"
                                        :class="{'is-invalid': form.errors.email}"
                                        name="name"
                                        required
                                        autocomplete="name"
                                        autofocus
                                        v-model="form.name"
                                    >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">
                                    Email
                                </label>

                                <div class="col-md-6">
                                    <input
                                        id="email"
                                        type="email"
                                        class="form-control"
                                        :class="{'is-invalid': form.errors.email}"
                                        name="email"
                                        required
                                        autocomplete="email"
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
                                        autocomplete="new-password"
                                        v-model="form.password"
                                    >
                                    <div v-if="form.errors.password" class="invalid-feedback" role="alert">
                                        {{ form.errors.password }}
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label
                                    for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end"
                                >
                                    Confirm Password
                                </label>

                                <div class="col-md-6">
                                    <input
                                        id="password-confirm"
                                        type="password"
                                        class="form-control"
                                        name="password_confirmation"
                                        required
                                        autocomplete="new-password"
                                        v-model="form.password_confirmation"
                                    >
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
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
            name: null,
            email: null,
            password: null,
            password_confirmation: null,
            remember: false,
        });

        return {form};
    },
};
</script>
