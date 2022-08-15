import { createRouter, createWebHistory } from "vue-router";

import Home from '../components/Home.vue';
import Pelicula from '../components/Pelicula.vue';
import NotFound from '../components/NotFound.vue';
import Genero from '../components/genero/Genero.vue';
import GeneroNuevo from '../components/genero/GeneroNuevo.vue';
import Actor from '../components/actor/Actor.vue';
import ActorNuevo from '../components/actor/ActorNuevo.vue';
import ActorEdit from '../components/actor/ActorEdit.vue';

const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'peliculas',
        path: '/peliculas',
        component: Pelicula
    },
    {
        name: 'generos',
        path: '/generos',
        component: Genero
    },
    {
        path: '/genero/nuevo',
        component: GeneroNuevo
    },
    {
        name: 'actores',
        path: '/actores',
        component: Actor
    },
    {
        name: 'actorNuevo',
        path: '/actores/nuevo',
        component: ActorNuevo
    },
    {
        path: '/actores/edit/:id',
        component: ActorEdit
    },
    {
        path: '/:pathMatch(.*)*',
        component: NotFound
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes
});

export default router;