<template>
    <PageHeader :enableBackButton="false" :enableSearchField="true" :searchUrl="$route('admin.users.index')">
        <template v-slot:pageTitle>All Users</template>
        <template v-slot:actionButtons>
            <Link :href="$route('admin.users.create')" class="btn btn-primary ml-3">
                Add New User
            </Link>
        </template>
    </PageHeader>

    <div class="page-body">
        <div class="box">
            <div class="card">
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in data.users" :key="user.id">
                            <td>{{ user.first_name }}</td>
                            <td>{{ user.last_name }}</td>
                            <td>{{ user.gender }}</td>
                            <td>{{ user.email }}</td>
                            <td>{{ user.phone }}</td>
                            <td>
                                <Link
                                    :href="$route('admin.users.edit', user.id)"
                                    class="btn btn-primary btn-round btn-outline btn-sm me-2"
                                >
                                    Edit
                                </Link>
                                <Link
                                    :href="$route('admin.users.delete', user.id)"
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
