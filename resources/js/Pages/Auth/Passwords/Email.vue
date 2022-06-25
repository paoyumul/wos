<template>
    <div class="container flex justify-center py-8">
        <div>
            <h1 class="text-center text-3xl font-bold">Reset Password</h1>
            <form
                class="bg-white max-w-[480px] p-4 rounded border-gray-100"
                @submit.prevent="form.post($route('password.update'))"
            >
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
                    <div v-if="form.errors.email" class="text-red-400 text-xs mt-0.5" role="alert">
                        {{ form.errors.email }}
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-full">
                    Send Password Reset Link
                </button>
            </form>
        </div>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    _token: document.querySelector('meta[name="csrf-token"]').content,
    email: null,
});
</script>
