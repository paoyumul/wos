<template>
    <form id="user-form" @submit.prevent="form[props.method](props.action)" method="POST">
        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" v-model="form.name">
        </div>
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" v-model="form.email">
        </div>
        <div class="form-group mb-3">
            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="phone" class="form-control" v-model="form.phone">
        </div>
    </form>
</template>

<script setup>
import { useForm, usePage } from '@inertiajs/inertia-vue3';

const props = defineProps({
    user: {
        type: Object,
        default: () => {},
    },
    action: {
        type: String,
    },
    method: {
        type: String,
        default: 'post',
    },
    buttonText: {
        type: String,
        default: 'Create',
    }
});

const form = useForm({
    _token: usePage().props.value.csrf_token,
    name: props.user?.name,
    email: props.user?.email,
    phone: props.user?.phone,
});
</script>
