<template>
    <PageHeader :enableBackButton="true" :backButtonUrl="$route('admin.services.index')">
        <template v-slot:pageTitle>Add New Service</template>
        <template v-slot:actionButtons>
            <button type="submit" form="service-form" class="btn btn-primary">
                Create Service
            </button>
        </template>
    </PageHeader>
    <div class="page-body">
        <div class="card">
            <div class="card-body">
                <service-form
                    :action="$route('admin.services.store')"
                >
                </service-form>
            </div>
        </div>
    </div>
</template>

<script setup>
import ServiceForm from './Form';
</script>
