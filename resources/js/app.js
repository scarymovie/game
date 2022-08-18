import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler';
import router from "./router";
import VueSweetalert2 from "vue-sweetalert2";

import App from './layouts/App.vue'
import CreateQuestion from './components/Questions/Create.vue'

import LaravelVuePagination from 'laravel-vue-pagination';
import Maska from 'maska'

const app = createApp(App)
app.use(router)
app.use(VueSweetalert2)
app.component('create-question', CreateQuestion)
app.component('Pagination', LaravelVuePagination)
app.mount('#app')
