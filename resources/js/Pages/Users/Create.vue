<template>
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl mb-0">Add New User</h1>
        <Link :href="$route('admin.users.create')" class="btn btn-primary">
            Create a User
        </Link>
    </div>
    <user-form
        :action="$route('admin.users.store')"
    ></user-form>
</template>

<script setup>
import { useForm, usePage, Link } from '@inertiajs/inertia-vue3';
import UserForm from './Form';

const user = usePage().props.value.user;
</script>
