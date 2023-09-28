<template>
    <PageHeader :enableBackButton="true" :backButtonUrl="$route('admin.records.index')">
        <template v-slot:pageTitle>Edit Record Info</template>
        <template v-slot:actionButtons>
            <button type="submit" form="record-form" class="btn btn-primary">
                Update Record
            </button>
        </template>
    </PageHeader>
    <div class="page-body">
        <div class="card">
            <div class="card-body">
                <record-form
                    :record="data.record"
                    :action="$route('admin.records.update', data.record.id)"
                    method="patch"
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
import { useForm, usePage, Link } from '@inertiajs/inertia-vue3';
import RecordForm from './Form';

defineProps({
    data: {
        type: Object,
        default: () => {},
    },
});
</script>
