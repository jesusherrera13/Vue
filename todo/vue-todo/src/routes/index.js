import { createRouter, createWebHistory } from "vue-router";
import Todos from '../components/Todos.vue';
import NotFound from '../components/NotFound.vue';
import Categoria from '../components/Categoria.vue';

const routes = [
    {
        path: '/',
        component: Todos
    },
    {
        path: '/categoria',
        component: Categoria
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