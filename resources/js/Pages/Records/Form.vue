<template>
    <form
        id="record-form"
        @submit.prevent="form[props.method](props.action, options)"
    >
        <div class="form-group mb-3">
            <label for="user_id">Client</label>
            <select
                name=""
                id="user_id"
                class="form-control"
                :class="{'is-invalid': $page.props.errors.user_id}"
                v-model="form.user_id"
                v-if="isAdmin"
            >
                <option v-for="user in users" :key="user.id" :value="user.id" :class="{'is-invalid': $page.props.errors.user_id}">
                    {{ user.first_name }} {{ user.last_name }}
                </option>
            </select>
            <input
                class="form-control"
                :value="`${user.first_name} ${user.last_name}`"
                v-if="!isAdmin"
                disabled
                readonly
            >
            <div class="invalid-feedback" v-if="$page.props.errors.user_id">
                {{ $page.props.errors.user_id }}
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="schedule">Remarks</label>
            <textarea
                type="text"
                name="remarks"
                id="remarks"
                class="form-control"
                :class="{'is-invalid': $page.props.errors.remarks}"
                v-model="form.remarks"
                style="height: 200px"
            ></textarea>
            <div class="invalid-feedback" v-if="$page.props.errors.remarks">
                {{ $page.props.errors.remarks }}
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="date">Upload Related Files</label>
            <input type="file" @input="form.file = $event.target.files[0]">
            <div class="invalid-feedback" v-if="$page.props.errors.files">
                {{ $page.props.errors.files }}
            </div>
        </div>
    </form>
</template>

<script setup>
import { computed } from 'vue';
import { useForm, usePage } from '@inertiajs/inertia-vue3';

const user = usePage().props.value.auth.user;
const isAdmin = user.role === 'Admin';

const props = defineProps({
    record: {
        type: Object,
        default: () => {
        },
    },
    action: {
        type: String,
    },
    method: {
        type: String,
        default: 'post',
    },
    services: {
        type: Array,
        default: () => [],
    },
    users: {
        type: Array,
        default: () => [],
    },
    schedules: {
        type: Array,
        default: () => [],
    },
});

const form = useForm({
    _token: usePage().props.value.csrf_token,
    user_id: props.record?.user_id,
    date: props.record?.date,
    remarks: props.record?.remarks,
    file: props.record?.file,
});

if (!isAdmin) {
    form.user_id = user.id;
}

const options = computed(() => {
    if (props.method === 'patch') {
        return {};
    }

    return {
        onSuccess: () => form.reset(),
    };
});
</script>
