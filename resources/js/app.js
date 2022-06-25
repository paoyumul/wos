import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import Layout from './Pages/Layout';
import PageHeader from './Components/PageHeader';

InertiaProgress.init();

createInertiaApp({
    resolve: name => {
        const page = require(`./Pages/${name}`).default;
        page.layout = page.layout || Layout;
        return page;
    },
    setup({el, App, props, plugin}) {
        let app = createApp({render: () => h(App, props)})
            .use(plugin);

        app.component('PageHeader', PageHeader);
        app.config.globalProperties.$route = route;

        app.mount(el);
    },
});
