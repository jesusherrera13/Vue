import { createRouter, createWebHashHistory, createWebHistory } from "vue-router";
import Todos from '../components/Todos.vue';
import NotFound from '../components/NotFound.vue';
import Add from '../components/Add.vue';

const routes = [
    {
        path: '/',
        component: Todos
    },
    {
        path: '/todo/add',
        component: Add
    },
    {
        path:'/:pathMatch(.*)*',
        component: NotFound
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes
});

export default router;