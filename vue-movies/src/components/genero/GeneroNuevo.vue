<template>
    <h1>Genero Nuevo</h1>
    <ul v-if="errors.length">
        <li v-for="error in errors">{{ error }}</li>
    </ul>
    Nombre:
    <input type="text" :class="{'error': errors.length}" v-model="genero.nombre">
    <button @click="post">Guardar</button>
</template>
<script>
import axios from 'axios';
import router from '../../routes';

export default {
    data() {
        return {
            genero: {
                nombre: null
            },
            errors: []
        }
    },
    methods: {
        async post() {
            this.errors = [];

            if(!this.genero.nombre) this.errors.push('Escriba el nombre');

            if(!this.errors.length) {
                let response = await axios.post('http://peliculas.localhost/api/genero', this.genero);
                if(response.status == 201) router.push('/generos');
            }
        }
    }
}
</script>

<style scoped>
.error {
    border: 1px solid red;
}
</style>