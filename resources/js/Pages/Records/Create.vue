<template>
    <PageHeader :enableBackButton="true" :backButtonUrl="$route('admin.records.index')">
        <template v-slot:pageTitle>Add New Record</template>
        <template v-slot:actionButtons>
            <button type="submit" form="record-form" class="btn btn-primary">
                Create Record
            </button>
        </template>
    </PageHeader>
    <div class="page-body">
        <div class="card">
            <div class="card-body">
                <record-form
                    :action="$route('admin.records.store')"
                    :services="data.services"
                    :users="data.users"
                    :schedules="data.schedules"
                >
                </record-form>
            </div>
        </div>
    </div>
</template>

<script setup>
import RecordForm from './Form';

defineProps({
    data: {
        type: Object,
        default: () => {},
    },
});
</script>
