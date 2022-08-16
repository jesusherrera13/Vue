<template>
    <h1>Actores</h1>
    <button @click="nuevo">Nuevo</button>
    <ul>
        <li v-for="actor in actores" @click="edit(actor.id)">
            {{ fullName(actor) }}
        </li>
    </ul>
</template>

<script>

import axios from 'axios';
import router from '../../routes';

export default {
    data() {
        return {
            actores: []
        }
    },
    mounted() {
        this.getData();
    },
    methods: {
        async getData() {
            let response = await axios.get('http://peliculas.localhost/api/actor');
            this.actores = response.data;
        },
        fullName(actor) {
            return (actor.nombre + ' ' + actor.apellido1 + '' + (actor.apellido2 ? ' ' + actor.apellido2 : '')).trim();
        },
        nuevo() {
            router.push('/actores/nuevo');
        },
        edit(id) {
            router.push('/actores/' + id);
        }
    },
    computed: {
        
    }
}
</script>