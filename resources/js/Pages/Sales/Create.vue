<template>
    <PageHeader :enableBackButton="true" :backButtonUrl="$route('admin.sales.index')">
        <template v-slot:pageTitle>Add New Sale</template>
        <template v-slot:actionButtons>
            <button type="submit" form="sale-form" class="btn btn-primary">
                Create Sale
            </button>
        </template>
    </PageHeader>
    <div class="page-body">
        <div class="card">
            <div class="card-body">
                <sale-form
                    :action="$route('admin.sales.store')"
                >
                </sale-form>
            </div>
        </div>
    </div>
</template>

<script setup>
import SaleForm from './Form';
</script>
