<template>
    <form id="user-form" @submit.prevent="form[props.method](props.action)" method="POST">
        <div class="form-group mb-3">
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" class="form-control" v-model="form.first_name">
        </div>
        <div class="form-group mb-3">
            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" class="form-control" v-model="form.last_name">
        </div>
        <div class="form-group mb-3">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control" v-model="form.gender">
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
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
        default: () => {
        },
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
    },
});

const form = useForm({
    _token: usePage().props.value.csrf_token,
    first_name: props.user?.first_name,
    last_name: props.user?.last_name,
    gender: props.user?.gender,
    email: props.user?.email,
    phone: props.user?.phone,
});
</script>
