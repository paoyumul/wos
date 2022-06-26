<template>
    <PageHeader :enableBackButton="true" :backButtonUrl="$route('admin.services.index')">
        <template v-slot:pageTitle>Edit {{ data.service.name }} Info</template>
        <template v-slot:actionButtons>
            <button type="submit" form="service-form" class="btn btn-primary">
                Update Service
            </button>
        </template>
    </PageHeader>
    <div class="page-body">
        <div class="card">
            <div class="card-body">
                <service-form
                    :service="data.service"
                    :action="$route('admin.services.update', data.service.id)"
                    method="patch"
                >
                </service-form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm, usePage, Link } from '@inertiajs/inertia-vue3';
import ServiceForm from './Form';

defineProps({
    data: {
        type: Object,
        default: () => {},
    },
});
</script>
