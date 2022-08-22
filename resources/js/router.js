import { createWebHistory, createRouter } from 'vue-router';
import Questions from "./components/Questions/Index.vue";
import Login from "./components/Login.vue"
import AuthenticatedLayout from "./layouts/Authenticated.vue";
import GuestLayout from "./layouts/Guest.vue";

function auth(to, from, next) {
    if (JSON.parse(localStorage.getItem('loggedIn'))) {
        next()
    }

    next('/login')
}

const routes = [
    {
        path: '',
        component: GuestLayout,
        redirect: {name:'Login'},
        children:
            [
                {
                    path: '/login',
                    name:'Login',
                    component: Login,

                },
            ]
    },
    {
        component: AuthenticatedLayout ,
        beforeEnter: auth,
        children:
            [
                {
                    path: '/home',
                    name: 'Questions',
                    component: Questions,
                },
            ]
    },

]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;
