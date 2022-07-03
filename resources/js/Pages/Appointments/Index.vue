<template>
    <PageHeader :enableBackButton="false">
        <template v-slot:pageTitle>All Appointments</template>
        <template v-slot:actionButtons>
            <Link :href="$route('admin.appointments.create')" class="btn btn-primary ml-3">
                Add New Appointment
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
                            <th>Time</th>
                            <th>Customer</th>
                            <th>Service</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="appointment in data.appointments" :key="appointment.id">
                            <td>{{ appointment.schedule.date }}</td>
                            <td>{{ appointment.schedule.time_from }} - {{ appointment.schedule.time_to }}</td>
                            <td>{{ appointment.user.first_name }} {{ appointment.user.last_name }}</td>
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
