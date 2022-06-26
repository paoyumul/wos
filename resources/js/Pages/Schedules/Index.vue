<template>
    <PageHeader :enableBackButton="false" :enableSearchField="true" :searchUrl="$route('admin.schedules.index')">
        <template v-slot:pageTitle>All Schedules</template>
        <template v-slot:actionButtons>
            <Link :href="$route('admin.schedules.create')" class="btn btn-primary ml-3">
                Add New Schedule
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
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="schedule in data.schedules" :key="schedule.id">
                            <td>{{ schedule.date }}</td>
                            <td>{{ schedule.time_from }} - {{ schedule.time_to }}</td>
                            <td>
                                <Link
                                    :href="$route('admin.schedules.edit', schedule.id)"
                                    class="btn btn-primary btn-round btn-outline me-2"
                                >
                                    Edit
                                </Link>
                                <Link
                                    :href="$route('admin.schedules.delete', schedule.id)"
                                    method="delete"
                                    as="button"
                                    type="button"
                                    class="btn btn-round btn-outline"
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
