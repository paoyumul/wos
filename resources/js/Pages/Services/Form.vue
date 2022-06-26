<template>
    <form id="service-form" @submit.prevent="form[props.method](props.action, options)" method="POST">
        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input
                type="text"
                id="name"
                name="name"
                class="form-control"
                :class="{'is-invalid': $page.props.errors.name}"
                v-model="form.name"
            >
            <div class="invalid-feedback" v-if="$page.props.errors.name">
                {{ $page.props.errors.name }}
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea
                name="description"
                id="description"
                class="form-control"
                cols="30"
                rows="10"
                v-model="form.description"
            ></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="price">Price</label>
            <input
                type="number"
                id="price"
                name="price"
                class="form-control"
                :class="{'is-invalid': $page.props.errors.price}"
                v-model="form.price"
            >
            <div class="invalid-feedback" v-if="$page.props.errors.price">
                {{ $page.props.errors.price }}
            </div>
        </div>
    </form>
</template>

<script setup>
import { computed } from 'vue';
import { useForm, usePage } from '@inertiajs/inertia-vue3';

const props = defineProps({
    service: {
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
    name: props.service?.name,
    description: props.service?.description,
    price: props.service?.price,
});

const options = computed(() => {
    if (props.method === 'patch') {
        return {};
    }

    return {
        onSuccess: () => form.reset(),
    };
});
</script>
