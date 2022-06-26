<template>
    <PageHeader :enableBackButton="true" :backButtonUrl="$route('admin.schedules.index')">
        <template v-slot:pageTitle>Add New Schedule</template>
        <template v-slot:actionButtons>
            <button type="submit" form="schedule-form" class="btn btn-primary">
                Create Schedule
            </button>
        </template>
    </PageHeader>
    <div class="page-body">
        <div class="card">
            <div class="card-body">
                <schedule-form
                    :action="$route('admin.schedules.store')"
                >
                </schedule-form>
            </div>
        </div>
    </div>
</template>

<script setup>
import ScheduleForm from './Form';
</script>
