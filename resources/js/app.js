import './bootstrap';

import { createApp, onMounted } from 'vue/dist/vue.esm-bundler';
import router from "./router";
import VueSweetalert2 from "vue-sweetalert2";
import useAuth from "./composables/auth";

import CreateQuestion from './components/Questions/Create.vue'

import LaravelVuePagination from 'laravel-vue-pagination';
import Maska from 'maska'

const app = createApp({})
app.use(router)
app.use(VueSweetalert2)
app.component('create-question', CreateQuestion)
app.component('Pagination', LaravelVuePagination)
app.mount('#app')
