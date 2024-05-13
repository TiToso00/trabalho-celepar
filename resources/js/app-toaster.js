import { createApp, h } from 'vue'
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue3';
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";

const el = document.getElementById('app');

const app = createApp({
    render: () =>
        h(InertiaApp, {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: (name) => require(`./Pages/${name}`).default,
        }),
});

app
    .use(InertiaPlugin)
    .use(Toast)
    .mixin({ methods: { route: window.route } })
    ;

app.mount(el);


// createInertiaApp({
//     resolve: name => require(`./Pages/${name}`),
//     setup({ el, App, props, plugin }) {
//         createApp({ render: () => h(App, props) })
//             .use(plugin)
//             .mount(el)
//     },
// })
