<template>
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl mb-0">Users</h1>
        <Link :href="$route('admin.users.create')" class="btn btn-primary">
            Create a User
        </Link>
    </div>
    <div class="table-container">
        <table class="table">
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
                        <Link
                            :href="$route('admin.users.edit', user.id)"
                            class="btn btn-primary btn-round btn-outline btn-sm mr-1"
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
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';

defineProps({
    users: Array,
});
</script>
