import './bootstrap';

import { createApp } from "vue";

import App from './layouts/App.vue'
import router from "./router";

createApp(App)
    .use(router)
    .mount("#app")

// import app from './layouts/layoutguest.vue'
//
// createApp(app).mount("#app")

// default from breeze
//
// import Alpine from 'alpinejs';
//
// window.Alpine = Alpine;
//
// Alpine.start();
