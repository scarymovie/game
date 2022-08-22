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
        path: '/',
        redirect: {name:'Questions'},
        component: AuthenticatedLayout ,
        beforeEnter: auth,
        children:
            [
                {
                    path: '',
                    name: 'Questions',
                    component: Questions,
                },
            ]
    },
    {
        path: '/login',
        component: GuestLayout,
        redirect: {name:'Login'},
        meta: { requiresGuest: true },
        children:
            [
                {
                    path: '/login',
                    name:'Login',
                    component: Login,

                },
            ]
    },


]

const router = createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach ((to, from, next) => {
    if(to.meta.requiresGuest){
        if (JSON.parse(localStorage.getItem('loggedIn'))) {
            next({
                name: 'Questions'
            })
        } else {
            next();
        }
    } else {
        next();
    }
});

export default router;
