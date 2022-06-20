<template>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Users</div>

                <div class="card-body">
                    <form @submit.prevent="form.patch(`/admin/users/${user.id}`)" method="POST">
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" v-model="form.name">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" v-model="form.email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone">Phone</label>
                            <input type="tel" id="phone" name="phone" class="form-control" v-model="form.phone">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { useForm, usePage } from '@inertiajs/inertia-vue3';

export default {
    setup() {
        const user = usePage().props.value.user;
        const form = useForm({
            _token: document.querySelector('meta[name="csrf-token"]').content,
            name: user.name,
            email: user.email,
            phone: user.phone,
        });

        return {
            user,
            form,
        };
    },
};
</script>
