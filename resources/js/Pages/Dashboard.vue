<template>
    <PageHeader :enableBackButton="false" :enableSearchField="false">
        <template v-slot:pageTitle></template>
    </PageHeader>
    <div class="grid grid-cols-12">
        <div class="col-span-6 md:col-span-12" v-if="isAdmin">
            <div class="text-lg mb-2" v-if="upcomingAppointments.length">Upcoming Appointments</div>
            <table v-if="upcomingAppointments.length">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Service</th>
                        <th>Schedule</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="appointment in upcomingAppointments" :key="appointment.id">
                        <td>{{ appointment.user.first_name }} {{ appointment.user.last_name }}</td>
                        <td>{{ appointment.service.name }}</td>
                        <td>{{ appointment.schedule.date }} {{
                                appointment.schedule.time_from
                            }}-{{ appointment.schedule.time_to }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="shadow-sm bg-white rounded-md py-6 px-4 flex flex-col items-center" v-else>
                <div class="text-lg text-center mb-0.5">No upcoming appointments yet.</div>
                <div class="text-md text-center max-w-[400px]">Be sure you set your schedule first for the clients to book an appointment.</div>
                <Link :href="$route('admin.schedules.index')" class="btn btn-primary mt-2">
                    Set the Schedules
                </Link>
            </div>
        </div>
        <div class="col-span-6 md:col-span-12" v-if="isAdmin">
            <div class="text-lg mb-2">Announcements</div>
            <form @submit.prevent="form.post('/announcements')">
                <textarea name="" v-model="form.announcement" class="p-3" id="" cols="30" rows="10" style="height: 200px"></textarea>
                <button class="btn btn-primary">Save Announcement</button>
            </form>
        </div>
        <div class="col-span-6 md:col-span-12" v-if="!isAdmin">
            <div class="text-lg mb-2">Announcements</div>
            <div v-html="form.announcement"></div>
        </div>
    </div>
</template>

<script setup>
import { useForm, usePage, Link } from '@inertiajs/inertia-vue3';

const upcomingAppointments = usePage().props.value.upcomingAppointments;
const isAdmin = usePage().props.value.auth.user.role === 'Admin';
const form = useForm({
    _token: usePage().props.value.csrf_token,
    announcement: usePage().props.value.announcement,
});
</script>
