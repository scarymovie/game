import { createWebHistory, createRouter } from 'vue-router';
import Questions from "./components/Questions/Index.vue";
import QuestionsCreate from "./components/Questions/Create.vue";
import Login from "./pages/login.vue"
// import home from './pages/home.vue';

const routes = [
    { path: '/', name:'Questions', component: Questions, meta:{ title: 'Вопросы' } },
    { path: '/login', name:'Login', component: Login, meta:{ title: 'Авторизация' } },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;
