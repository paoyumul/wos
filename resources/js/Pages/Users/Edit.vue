<template>
    <PageHeader :enableBackButton="isAdmin" :backButtonUrl="$route('admin.users.index')">
        <template v-slot:pageTitle>Edit {{ data.user.first_name }} Profile</template>
        <template v-slot:actionButtons>
            <button type="submit" form="user-form" class="btn btn-primary">
                Update Profile
            </button>
        </template>
    </PageHeader>
    <div class="page-body">
        <div class="card">
            <div class="card-body">
                <user-form
                    :user="data.user"
                    :action="$route('admin.users.update', data.user.id)"
                    method="patch"
                    button-text="Update User Profile"
                >
                </user-form>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <h3>Appointments</h3>
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Service</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="appointment in data.user.appointments" :key="appointment.id">
                            <td>{{ appointment.schedule.date }}</td>
                            <td>{{ appointment.schedule.time_from }} - {{ appointment.schedule.time_to }}</td>
                            <td>{{ appointment.service.name }}</td>
                            <td>
                                <Link
                                    :href="$route('admin.appointments.edit', appointment.id)"
                                    class="btn btn-primary btn-round btn-sm btn-outline me-2"
                                >
                                    Edit
                                </Link>
                                <Link
                                    :href="$route('admin.appointments.delete', appointment.id)"
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
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <h3>Payments</h3>
                <table class="table table-vcenter card-table">
                    <thead>
                        <tr>
                            <th>Service</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="sale in data.user.payments" :key="sale.id">
                            <td>{{ sale.service.name }}</td>
                            <td>{{ sale.date }}</td>
                            <td>{{ sale.amount }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm, usePage, Link } from '@inertiajs/inertia-vue3';
import UserForm from './Form';

const isAdmin = usePage().props.value.auth.user.role === 'Admin';

defineProps({
    data: {
        type: Object,
        default: () => {
        },
    },
});
</script>
