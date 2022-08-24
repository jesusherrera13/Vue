import { createRouter, createWebHistory } from "vue-router";
import Todos from '../components/Todos.vue';
import NotFound from '../components/NotFound.vue';
import Categorie from '../components/Categorie.vue';

const routes = [
    {
        path: '/',
        component: Todos
    },
    {
        path: '/categorie',
        component: Categorie
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