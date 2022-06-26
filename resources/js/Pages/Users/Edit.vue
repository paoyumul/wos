<template>
    <PageHeader :enableBackButton="true" :backButtonUrl="$route('admin.users.index')">
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
    </div>
</template>

<script setup>
import { useForm, usePage, Link } from '@inertiajs/inertia-vue3';
import UserForm from './Form';

defineProps({
    data: {
        type: Object,
        default: () => {},
    },
});
</script>
