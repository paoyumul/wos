<template>
    <button type="submit" :form="`form-${props.id}`" class="btn btn-white btn-sm">Delete</button>
    <form :id="`form-${props.id}`" method="POST" @submit.prevent="form.delete(`/admin/users/${props.id}`)">
    </form>
</template>

<script setup>
import { defineProps } from 'vue';
import { useForm, usePage } from '@inertiajs/inertia-vue3';

const form = useForm({
    _token: usePage().props.value.csrf_token,
    _method: 'DELETE',
});
const props = defineProps(['id']);

function destroy() {
    document.getElementById(`${props.id}`).submit();
}
</script>
