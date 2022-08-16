<template>
    <h1>Genero Nuevo {{ $route.params.id}}</h1>
    Nombre:
    <input type="text" :class="{'error': errors.length}" v-model="genero.nombre">
    <button @click="post">Guardar</button>
    <button @click="cancelar">Cancelar</button>
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
    mounted() {
        this.getData();
    },
    methods: {
        async post() {
            this.errors = [];

            if(!this.genero.nombre) this.errors.push('Escriba el nombre');

            if(!this.errors.length) {
                let response = await axios.put('http://peliculas.localhost/api/genero/' + this.$route.params.id, this.genero);
                if(response.status == 200) router.push('/generos');
            }
        },
        async getData() {
           let response = await axios.get('http://peliculas.localhost/api/genero/' + this.$route.params.id);
           this.genero = response.data;
        },
        cancelar() {

        }
    }
}
</script>

<style scoped>
.error {
    border: 1px solid red;
}
</style>