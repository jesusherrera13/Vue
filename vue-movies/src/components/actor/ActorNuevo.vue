<template>
    <h1>Actor</h1>
    <form action="">
        Nombre:
        <input type="text" v-model="actor.nombre">
        <br />
        Apellido 1:
        <input type="text" v-model="actor.apellido1">
        <br />
        Apellido 2:
        <input type="text" v-model="actor.apellido2">
        <br />
    </form>
    <button @click="post">Guardar</button>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            actor: {
                nombre: null,
                apellido1: null,
                apellido2: null,
            }
        }
    },
    methods: {
        async post() {
            let response = await axios.post('http://peliculas.localhost/api/actor', this.actor);
            console.log(response.data);
        }
    }
}
</script>