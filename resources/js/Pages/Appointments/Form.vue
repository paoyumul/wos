<template>
    <form id="appointment-form" @submit.prevent="form[props.method](props.action, options)" method="POST">
        <div class="form-group mb-3">
            <label for="user_id">Customers</label>
            <select
                name=""
                id="user_id"
                class="form-control"
                :class="{'is-invalid': $page.props.errors.user_id}"
                v-model="form.user_id"
            >
                <option v-for="user in users" :value="user.id">
                    {{ user.first_name }} {{ user.last_name }}
                </option>
            </select>
            <div class="invalid-feedback" v-if="$page.props.errors.service_id">
                {{ $page.props.errors.service_id }}
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="service">Service</label>
            <select
                name="" id="service" class="form-control"
                :class="{'is-invalid': $page.props.errors.service_id}"
                v-model="form.service_id"
            >
                <option v-for="service in services" :value="service.id">
                    {{ service.name }}
                </option>
            </select>
            <div class="invalid-feedback" v-if="$page.props.errors.service_id">
                {{ $page.props.errors.service_id }}
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="date">Date</label>
            <input
                type="date"
                name="date"
                id="date"
                class="form-control"
                :class="{'is-invalid': $page.props.errors.date}"
                v-model="form.date"
            >
            <div class="invalid-feedback" v-if="$page.props.errors.date">
                {{ $page.props.errors.date }}
            </div>
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
    appointment: {
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
    services: {
        type: Array,
        default: () => [],
    },
    users: {
        type: Array,
        default: () => [],
    },
});

const form = useForm({
    _token: usePage().props.value.csrf_token,
    user_id: props.appointment?.user_id,
    service_id: props.appointment?.service_id,
    date: props.appointment?.date,
    time_from: props.appointment?.time_from,
    time_to: props.appointment?.time_to,
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
