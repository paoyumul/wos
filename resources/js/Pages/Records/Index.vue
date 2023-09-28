<template>
    <PageHeader :enableBackButton="false">
        <template v-slot:pageTitle>All Records</template>
        <template v-slot:actionButtons>
            <Link :href="$route('admin.records.create')" class="btn btn-primary ml-3">
                Add New Record
            </Link>
        </template>
    </PageHeader>

    <div class="page-body">
        <div class="box">
            <div class="card">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Customer</th>
                            <th>Remarks</th>
                            <th>File</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="record in data.records" :key="record.id">
                            <td>{{ record.created_at }}</td>
                            <td>{{ record.user.first_name }} {{ record.user.last_name }}</td>
                            <td>{{ record.remarks }}</td>
                            <td><img :src="record.file"></td>
                            <td>
                                <Link
                                    :href="$route('admin.records.edit', record.id)"
                                    class="btn btn-primary btn-round btn-sm btn-outline me-2"
                                >
                                    Edit
                                </Link>
                                <Link
                                    :href="$route('admin.records.delete', record.id)"
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
