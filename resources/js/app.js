import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler';
import { createRouter, createWebHistory } from "vue-router";
// import router from "./router";

import App from './layouts/App.vue'
import Questions from "./components/Questions.vue";
import Login from "./pages/login.vue"

import LaravelVuePagination from 'laravel-vue-pagination';
import Maska from 'maska'

    const routes = [
        { path: '/', component: Questions },
        { path: '/login', component: Login },
    ]

    const router = createRouter({
        history: createWebHistory(),
        routes
    })

    const app = createApp(App)
    app.use(router)
    app.component('questions', Questions)
    app.component('Pagination', LaravelVuePagination)
    app.mount('#app')

// createApp()
//     .use(router)
//     .use(Maska)
//     .component('questions', Questions)
//     .mount("#app")


// import app from './layouts/layoutguest.vue'
