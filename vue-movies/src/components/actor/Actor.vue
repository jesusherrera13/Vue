<template>
    <h1>Actores</h1>
    <button @click="actorNuevo">Nuevo</button>
    <ul>
        <li v-for="actor in actores">
            {{ fullName(actor) }}
        </li>
    </ul>
</template>

<script>

import axios from 'axios';
import router from '../../routes';

const actorNuevo = () => {
    console.log('dancing')
    router.push('/actores/nuevo');
};

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
            return (actor.nombre + ' ' + actor.apellido1 + ' ' + actor.apellido2).trim();
        },
        actorNuevo() {
            router.push('/actores/nuevo');
        }
    },
    computed: {
        
    }
}
</script>