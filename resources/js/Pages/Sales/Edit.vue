<template>
    <PageHeader :enableBackButton="true" :backButtonUrl="$route('admin.sales.index')">
        <template v-slot:pageTitle>Edit Sale</template>
        <template v-slot:actionButtons>
            <button type="submit" form="sale-form" class="btn btn-primary">
                Update Sale
            </button>
        </template>
    </PageHeader>
    <div class="page-body">
        <div class="card">
            <div class="card-body">
                <sale-form
                    :sale="data.sale"
                    :action="$route('admin.sales.update', data.sale.id)"
                    method="patch"
                >
                </sale-form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm, usePage, Link } from '@inertiajs/inertia-vue3';
import SaleForm from './Form';

defineProps({
    data: {
        type: Object,
        default: () => {},
    },
});
</script>
