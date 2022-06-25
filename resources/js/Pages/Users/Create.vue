<template>
    <PageHeader :enableBackButton="true" :backButtonUrl="$route('admin.users.index')">
        <template v-slot:pageTitle>Add New User</template>
        <template v-slot:actionButtons>
            <button type="submit" form="user-form" class="btn btn-primary">
                Create User
            </button>
        </template>
    </PageHeader>
    <div class="page-body">
        <div class="card">
            <div class="card-body">
                <user-form
                    :action="$route('admin.users.store')"
                >
                </user-form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm, usePage, Link } from '@inertiajs/inertia-vue3';
import UserForm from './Form';

const user = usePage().props.value.user;
</script>
