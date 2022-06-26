<template>
    <PageHeader :enableBackButton="true" :backButtonUrl="$route('admin.schedules.index')">
        <template v-slot:pageTitle>Add New Schedule</template>
        <template v-slot:actionButtons>
            <button type="submit" form="schedule-form" class="btn btn-primary">
                Generate Schedules
            </button>
        </template>
    </PageHeader>
    <div class="page-body">
        <div class="card">
            <div class="card-body">
                <form id="schedule-form" @submit.prevent="form.post($route('admin.schedules.store'))">
                    <div class="form-group mb-3">
                        <label for="date_form">Starting Date (From)</label>
                        <input
                            type="date"
                            name="date_form"
                            id="date_form"
                            class="form-control"
                            :class="{'is-invalid': $page.props.errors.date_from}"
                            v-model="form.date_from"
                        >
                        <div class="invalid-feedback" v-if="$page.props.errors.date_from">
                            {{ $page.props.errors.date_from }}
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="date_to">End Date (To)</label>
                        <input
                            type="date"
                            name="date_to"
                            id="date_to"
                            class="form-control"
                            :class="{'is-invalid': $page.props.errors.date_to}"
                            v-model="form.date_to"
                        >
                        <div class="invalid-feedback" v-if="$page.props.errors.date_to">
                            {{ $page.props.errors.date_to }}
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
            </div>
        </div>
    </div>
</template>

<script setup>
import ScheduleForm from './Form';
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
    date_from: props.schedule?.date_from,
    date_to: props.schedule?.date_to,
    time_from: props.schedule?.time_from || '08:00',
    time_to: props.schedule?.time_to || '17:00',
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
