<template>
    <PageHeader :enableBackButton="true" :backButtonUrl="$route('admin.appointments.index')">
        <template v-slot:pageTitle>Add New Appointment</template>
        <template v-slot:actionButtons>
            <button type="submit" form="appointment-form" class="btn btn-primary">
                Create Appointment
            </button>
        </template>
    </PageHeader>
    <div class="page-body">
        <div class="card">
            <div class="card-body">
                <appointment-form
                    :action="$route('admin.appointments.store')"
                    :services="data.services"
                    :users="data.users"
                >
                </appointment-form>
            </div>
        </div>
    </div>
</template>

<script setup>
import AppointmentForm from './Form';

defineProps({
    data: {
        type: Object,
        default: () => {},
    },
});
</script>
