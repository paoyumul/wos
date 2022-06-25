<template>
    <div class="container flex justify-center py-8">
        <div>
            <h1 class="text-center text-3xl font-bold">Reset Password</h1>
            <form
                class="bg-white max-w-[480px] p-7 rounded border-gray-100"
                @submit.prevent="form.post($route('password.update'))"
            >
                <input type="hidden" name="token" :value="form.token">

                <div class="mb-3">
                    <label for="email">Email Address</label>
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

                <div class="mb-3">
                    <label for="password">Password</label>
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

                <div class="mb-3">
                    <label for="password-confirm">
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

                <button type="submit" class="btn btn-primary w-full">
                    Reset Password
                </button>
            </form>
        </div>
    </div>
</template>

<script setup>
import { useForm, usePage } from '@inertiajs/inertia-vue3';

const form = useForm({
    _token: document.querySelector('meta[name="csrf-token"]').content,
    token: usePage().props.value.token,
    email: null,
    password: null,
    password_confirmation: null,
});
</script>
