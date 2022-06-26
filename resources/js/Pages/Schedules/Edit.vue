<template>
    <PageHeader :enableBackButton="true" :backButtonUrl="$route('admin.schedules.index')">
        <template v-slot:pageTitle>Edit Schedule Info</template>
        <template v-slot:actionButtons>
            <button type="submit" form="schedule-form" class="btn btn-primary">
                Update Schedule
            </button>
        </template>
    </PageHeader>
    <div class="page-body">
        <div class="card">
            <div class="card-body">
                <schedule-form
                    :schedule="data.schedule"
                    :action="$route('admin.schedules.update', data.schedule.id)"
                    method="patch"
                >
                </schedule-form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm, usePage, Link } from '@inertiajs/inertia-vue3';
import ScheduleForm from './Form';

defineProps({
    data: {
        type: Object,
        default: () => {},
    },
});
</script>
