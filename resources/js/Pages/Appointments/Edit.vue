<template>
    <PageHeader :enableBackButton="true" :backButtonUrl="$route('admin.appointments.index')">
        <template v-slot:pageTitle>Edit Appointment Info</template>
        <template v-slot:actionButtons>
            <button type="submit" form="appointment-form" class="btn btn-primary">
                Update Appointment
            </button>
        </template>
    </PageHeader>
    <div class="page-body">
        <div class="card">
            <div class="card-body">
                <appointment-form
                    :appointment="data.appointment"
                    :action="$route('admin.appointments.update', data.appointment.id)"
                    method="patch"
                    :services="data.services"
                    :users="data.users"
                    :schedules="data.schedules"
                >
                </appointment-form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm, usePage, Link } from '@inertiajs/inertia-vue3';
import AppointmentForm from './Form';

defineProps({
    data: {
        type: Object,
        default: () => {},
    },
});
</script>
