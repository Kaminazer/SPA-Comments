import './bootstrap';
import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import App from './src/App.vue';
import Home from "./src/components/Home.vue";
import Create from "./src/components/Create.vue";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            component: Home,
            name: 'home'
        },
        {
            path: '/create',
            component: Create,
            name: 'create'
        },
    ]
});

const app = createApp(App);
app.use(router);
app.mount('#app');

