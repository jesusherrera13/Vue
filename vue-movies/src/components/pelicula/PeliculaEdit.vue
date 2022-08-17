<template>
    Título:
    <input type="text" v-model="pelicula.titulo">
    <br />
    Año:
    <input type="text" v-model="pelicula.anio">
    <br />
    <button @click="guardar">Guardar</button>
    <button @click="cancelar">Cancelar</button>
</template>
<script>
import axios from 'axios';
import router from '../../routes';

export default {
    data() {
        return {
            pelicula: {

            }
        }
    },
    mounted() {
        this.getData();
    },
    methods: {
        async getData() {
            let response = await axios.get('http://peliculas.localhost/api/pelicula/' + this.$route.params.id);
            this.pelicula = response.data;
        },
        async guardar() {
            let response = await axios.put('http://peliculas.localhost/api/pelicula/' + this.$route.params.id, this.pelicula);
            if(response.status == 200) router.push('/peliculas');
        }
    }
}
</script>