import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import 'bootstrap/dist/css/bootstrap.css'
import '../../public/assets/app.css';
import '../../public/assets/media.css';
import { createPinia } from 'pinia';
import { Toaster } from 'vue-sonner';
import 'vue-sonner/style.css';

const pinia = createPinia();

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue')
        return pages[`./Pages/${name}.vue`]()
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(pinia)
            .component('Toaster', Toaster)
            .mount(el)
    }
})