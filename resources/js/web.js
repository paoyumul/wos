import { createApp, onMounted } from 'vue';

const app = createApp({
    setup() {
        onMounted(() => {
        });
    },
});

app.config.globalProperties.$route = route;
app.mount('#app');
