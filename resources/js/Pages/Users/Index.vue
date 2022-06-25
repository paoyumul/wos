<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="mb-0">Users</h1>
                <a href="" class="btn btn-primary">Create a User</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="user in users">
                                <td>{{ user.name }}</td>
                                <td>{{ user.email }}</td>
                                <td>{{ user.phone }}</td>
                                <td>
                                    <Link :href="`/admin/users/${user.id}/edit`" class="btn btn-white btn-sm me-1">Edit</Link>
                                    <Link :href="`/admin/users/${user.id}`" method="delete" as="button" type="button" class="btn btn-white btn-sm me-1">Delete</Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/inertia-vue3';
import DeleteButton from '../../components/DeleteButton';

defineProps({
    users: Array,
})
</script>
