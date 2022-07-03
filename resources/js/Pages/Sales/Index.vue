<template>
    <PageHeader :enableBackButton="false" :enableSearchField="false">
        <template v-slot:pageTitle>All Sales</template>
        <template v-slot:actionButtons>
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
import { Link, usePage } from '@inertiajs/inertia-vue3';
import Pagination from '../../Components/Pagination';

defineProps({
    data: {
        type: Object,
        default: () => {},
    },
});
</script>
