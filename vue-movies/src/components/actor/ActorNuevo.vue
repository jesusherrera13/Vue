<template>
    <h1>Actor</h1>
    <div v-if="errors.length">
        <ul>
            <li v-for="error in errors">{{ error }}</li>
        </ul>
    </div>
    <form action="">
        Nombre:
        <input type="text" :class="{'error': errors.length}" v-model="actor.nombre">
        <br />
        Apellido 1:
        <input type="text" :class="{'error': errors.length}" v-model="actor.apellido1">
        <br />
        Apellido 2:
        <input type="text" v-model="actor.apellido2">
        <br />
    </form>
    <button @click="post">Guardar</button>
    <button @click="cancelar">Cancelar</button>
</template>

<script>
import axios from 'axios';
import router from '../../routes';

export default {
    data() {
        return {
            actor: {
                nombre: null,
                apellido1: null,
                apellido2: null,
            },
            errors: []
        }
    },
    methods: {
        async post() {

            this.errors = [];
            
            if(!this.actor.nombre) this.errors.push('Escriba el Nombre');
            if(!this.actor.apellido1) this.errors.push('Escriba el Apellido 1')

            if(!this.errors.length) {
                let response = await axios.post('http://peliculas.localhost/api/actor', this.actor);
                if(response.status == 201) router.push('/actores');
            }
        },
        cancelar() {
            router.push('/actores');
        }
    }
}
</script>

<style scoped>
.error {
    border: 1px solid red;
}
</style>