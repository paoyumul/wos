<template>
    <PageHeader :enableBackButton="false" :enableSearchField="false">
        <template v-slot:pageTitle>
            All Sales
            <span class="text-xs block ml-3">Total: <span class="text-base">Php {{ data.total_amount }}</span> <template v-if="data.date_from && data.date_to">({{ data.date_from }} to {{ data.date_to }})</template></span>
        </template>
        <template v-slot:actionButtons>
            <button class="btn btn-secondary ml-3 dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside">
               Select Date Range
            </button>
            <form id="date-range-filter" class="dropdown-menu dropdown-menu-end" @submit.prevent="form.get($route('admin.sales.index'))">
                <div class="dropdown-item flex-col items-start">
                    <label for="date_from" class="block text-xs mb-0.5">From</label>
                    <input type="date" id="date_from" class="form-control text-sm" v-model="form.date_from">
                </div>
                <div class="dropdown-item flex-col items-start">
                    <label for="date_to" class="block text-xs mb-0.5">To</label>
                    <input type="date" id="date_to" class="form-control text-sm" v-model="form.date_to" :disabled="!form.date_from" :min="form.date_from">
                </div>
                <div class="dropdown-item">
                    <button type="submit" class="btn btn-primary btn-small w-full">Apply Filter</button>
                </div>
                <div class="dropdown-item">
                    <button type="button" @click.prevent="clear" class="btn btn-small w-full">Clear</button>
                </div>
            </form>
            <Link :href="$route('admin.sales.create')" class="btn btn-primary ml-3">
                Add New Sale
            </Link>
        </template>
    </PageHeader>
    <div class="page-body">
        <div class="box">
            <div class="card">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>Client</th>
                            <th>Service</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="sale in data.sales" :key="sale.id">
                            <td>{{ sale.user.first_name }} {{ sale.user.last_name }}</td>
                            <td>{{ sale.service.name }}</td>
                            <td>{{ sale.date }}</td>
                            <td>{{ sale.amount }}</td>
                            <td>
                                <Link
                                    :href="$route('admin.sales.edit', sale.id)"
                                    class="btn btn-primary btn-round btn-outline btn-sm me-2"
                                >
                                    Edit
                                </Link>
                                <Link
                                    :href="$route('admin.sales.delete', sale.id)"
                                    method="delete"
                                    as="button"
                                    type="button"
                                    class="btn btn-round btn-outline btn-sm"
                                >
                                    Delete
                                </Link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <pagination :paginator="data.paginator"></pagination>
        </div>
    </div>
</template>

<script setup>
import { Link, useForm, usePage } from '@inertiajs/inertia-vue3';
import Pagination from '../../Components/Pagination';

const props = defineProps({
    data: {
        type: Object,
        default: () => {},
    },
});

const form = useForm({
    date_from: props.data.date_from,
    date_to:  props.data.date_to,
});

const clear = () => {
    form.date_from = ''
    form.date_to = ''

    document.querySelector('#date-range-filter').submit();
}
</script>
