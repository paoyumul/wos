<template>
    <form id="sale-form" method="POST" @submit.prevent="form[props.method](props.action, options)">
        <div class="form-group mb-3">
            <label for="client">Client</label>
            <select
                id="client" v-model="form.user_id"
                :class="{'is-invalid': $page.props.errors.user_id}"
                class="form-control"
                name="client"
                required
            >
                <option

                    v-for="client in usePage().props.value.clients"
                    :value="client.id"
                >
                    {{ client.first_name }} {{ client.last_name }}
                </option>
            </select>
            <div v-if="$page.props.errors.user_id" class="invalid-feedback">
                {{ $page.props.errors.user_id }}
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="date">Service</label>
            <div v-if="$page.props.errors.date" class="invalid-feedback">
                {{ $page.props.errors.date }}
            </div>
            <select
                id="service_id"
                name="client"
                class="form-control"
                :class="{'is-invalid': $page.props.errors.service_id}"
                v-model="form.service_id"
                required
            >
                <option

                    v-for="service in usePage().props.value.services"
                    :value="service.id"
                >
                    {{ service.name }}
                </option>
            </select>
            <div v-if="$page.props.errors.service_id" class="invalid-feedback">
                {{ $page.props.errors.service_id }}
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="date">Date</label>
            <input
                id="date"
                v-model="form.date"
                :class="{'is-invalid': $page.props.errors.date}"
                class="form-control"
                name="date"
                type="date"
            >
            <div v-if="$page.props.errors.date" class="invalid-feedback">
                {{ $page.props.errors.date }}
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="amount">Amount</label>
            <input
                id="amount"
                v-model="form.amount"
                :class="{'is-invalid': $page.props.errors.amount}"
                class="form-control"
                name="amount"
                type="number"
            >
            <div v-if="$page.props.errors.amount" class="invalid-feedback">
                {{ $page.props.errors.amount }}
            </div>
        </div>
    </form>
</template>

<script setup>
import { computed } from 'vue';
import { useForm, usePage } from '@inertiajs/inertia-vue3';

const props = defineProps({
    sale: {
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
    buttonText: {
        type: String,
        default: 'Create',
    },
});

const form = useForm({
    _token: usePage().props.value.csrf_token,
    user_id: props.sale?.user_id,
    service_id: props.sale?.service_id,
    date: props.sale?.date,
    amount: props.sale?.amount,
});

const options = computed(() => {
    if (props.method === 'patch') {
        return {};
    }

    return {
        onSuccess: () => form.reset(),
    };
});
</script>
