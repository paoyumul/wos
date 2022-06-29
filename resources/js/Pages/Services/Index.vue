<template>
    <PageHeader :enableBackButton="false" :enableSearchField="true" :searchUrl="$route('admin.services.index')">
        <template v-slot:pageTitle>All Services</template>
        <template v-slot:actionButtons>
            <Link :href="$route('admin.services.create')" class="btn btn-primary ml-3">
                Add New Service
            </Link>
        </template>
    </PageHeader>

    <div class="page-body">
        <div class="box">
            <div class="card">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="service in data.services" :key="service.id">
                            <td>{{ service.name }}</td>
                            <td>{{ service.description }}</td>
                            <td>{{ service.price }}</td>
                            <td>
                                <Link
                                    :href="$route('admin.services.edit', service.id)"
                                    class="btn btn-primary btn-round btn-outline btn-sm me-2"
                                >
                                    Edit
                                </Link>
                                <Link
                                    :href="$route('admin.services.delete', service.id)"
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
