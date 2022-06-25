<template>
    <div class="container flex justify-center py-8">
        <div>
            <h1 class="text-center text-3xl font-bold">Login to your account</h1>
            <form
                class="bg-white max-w-[480px] p-7 rounded border-gray-100"
                @submit.prevent="form.post('/login')"
            >
                <input type="hidden" name="remember" value="true" />
                <div class="mb-3">
                    <label for="email-address">Email address</label>
                    <input
                        id="email-address"
                        name="email"
                        type="email"
                        autocomplete="email"
                        required=""
                        placeholder="Email address"
                        v-model="form.email"
                    />
                    <div v-if="form.errors.email" class="text-red-400 text-xs mt-0.5" role="alert">
                        {{ form.errors.email }}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        autocomplete="current-password"
                        required=""
                        placeholder="Password"
                        v-model="form.password"
                    />
                    <div v-if="form.errors.password" class="text-red-400 text-xs mt-0.5" role="alert">
                        {{ form.errors.password }}
                    </div>
                </div>
                <div class="mb-3 flex items-center justify-between">
                    <div class="flex items-center">
                        <input
                            id="remember-me"
                            name="remember-me"
                            type="checkbox"
                            class="h-2 w-2 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                        />
                        <label for="remember-me" class="ml-1 block text-sm text-gray-900"> Remember me </label>
                    </div>
                    <div class="text-sm">
                        <Link :href="$route('password.request')" class="font-medium text-indigo-600 hover:text-indigo-500">
                            Forgot your password?
                        </Link>
                    </div>
                </div>
                <div>
                    <button
                        type="submit"
                        class="btn btn-primary w-full"
                    >
                        Sign in
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import { Link, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    _token: document.querySelector('meta[name="csrf-token"]').content,
    email: null,
    password: null,
    remember: false,
});
</script>
