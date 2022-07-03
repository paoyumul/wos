<template>
    <form
        id="appointment-form"
        @submit.prevent="form[props.method](props.action, options)"
        v-if="schedules.length"
    >
        <div class="form-group mb-3">
            <label for="user_id">Client</label>
            <select
                name=""
                id="user_id"
                class="form-control"
                :class="{'is-invalid': $page.props.errors.user_id}"
                v-model="form.user_id"
                v-if="isAdmin"
            >
                <option v-for="user in users" :value="user.id" :class="{'is-invalid': $page.props.errors.user_id}">
                    {{ user.first_name }} {{ user.last_name }}
                </option>
            </select>
            <input
                class="form-control"
                :value="`${user.first_name} ${user.last_name}`"
                v-if="!isAdmin"
                disabled
                readonly
            >
            <div class="invalid-feedback" v-if="$page.props.errors.user_id">
                {{ $page.props.errors.user_id }}
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="service">Service</label>
            <select
                name=""
                id="service"
                class="form-control"
                :class="{'is-invalid': $page.props.errors.service_id}"
                v-model="form.service_id"
            >
                <option v-for="service in services" :value="service.id">
                    {{ service.name }} - {{ service.price }}
                </option>
            </select>
            <div class="invalid-feedback" v-if="$page.props.errors.service_id">
                {{ $page.props.errors.service_id }}
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="schedule">Select a Schedule</label>
            <select
                name=""
                id="schedule"
                class="form-control"
                :class="{'is-invalid': $page.props.errors.schedule_id}"
                v-model="form.schedule_id"
            >
                <option v-for="schedule in schedules" :value="schedule.id">
                    {{ schedule.date }} {{ schedule.time_from }}
                </option>
            </select>
            <div class="invalid-feedback" v-if="$page.props.errors.schedule_id">
                {{ $page.props.errors.schedule_id }}
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="date">Notes</label>
            <textarea
                type="date"
                name="date"
                id="date"
                class="form-control"
                :class="{'is-invalid': $page.props.errors.note}"
                v-model="form.notes"
                style="height: 200px"
            ></textarea>
            <div class="invalid-feedback" v-if="$page.props.errors.note">
                {{ $page.props.errors.note }}
            </div>
        </div>
    </form>
    <div v-else>
        <div class="text-2xl text-center max-w-[400px] mx-auto py-5">
            No available schedule yet. Please try again later.
        </div>
    </div>
</template>

<script setup>
import { computed } from 'vue';
import { useForm, usePage } from '@inertiajs/inertia-vue3';

const user = usePage().props.value.auth.user;
const isAdmin = user.role === 'Admin';

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
    schedules: {
        type: Array,
        default: () => [],
    },
});

const form = useForm({
    _token: usePage().props.value.csrf_token,
    user_id: props.appointment?.user_id,
    service_id: props.appointment?.service_id,
    schedule_id: props.appointment?.schedule_id,
    notes: props.appointment?.notes,
});

if (!isAdmin) {
    form.user_id = user.id;
}

const options = computed(() => {
    if (props.method === 'patch') {
        return {};
    }

    return {
        onSuccess: () => form.reset(),
    };
});
</script>
