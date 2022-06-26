<template>
    <form id="schedule-form" @submit.prevent="form[props.method](props.action, options)" method="POST">
        <div class="form-group mb-3">
            <label for="date">Date</label>
            <input
                type="date"
                name="date"
                id="date"
                class="form-control"
                v-model="form.date"
            >
        </div>
        <div class="form-group mb-3">
            <label for="time_from">From</label>
            <input
                type="time"
                id="time_from"
                name="time_from"
                class="form-control"
                :class="{'is-invalid': $page.props.errors.time_from}"
                v-model="form.time_from"
            >
            <div class="invalid-feedback" v-if="$page.props.errors.time_from">
                {{ $page.props.errors.time_from }}
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="time_from">To</label>
            <input
                type="time"
                id="time_to"
                name="time_to"
                class="form-control"
                :class="{'is-invalid': $page.props.errors.time_to}"
                v-model="form.time_to"
            >
            <div class="invalid-feedback" v-if="$page.props.errors.time_to">
                {{ $page.props.errors.time_to }}
            </div>
        </div>
    </form>
</template>

<script setup>
import { computed } from 'vue';
import { useForm, usePage } from '@inertiajs/inertia-vue3';

const props = defineProps({
    schedule: {
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
    date: props.schedule?.date,
    time_from: props.schedule?.time_from,
    time_to: props.schedule?.time_to,
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
