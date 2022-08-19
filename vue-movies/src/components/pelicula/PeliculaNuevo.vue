<template>
    Título:
    <input type="text" v-model="pelicula.titulo">
    <br />
    Año:
    <input type="number" v-model="pelicula.anio">
    <br />
    Género
    <select multiple>
        <option v-for="genero in generos" v-bind:value="genero.id">{{ genero }}</option>
    </select>{{ generos }}
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
                titulo: null,
                anio: null,
                generos: [],
            },
            generos: []
        }
    },
    mounted() {
        this.getData();
    }, 
    methods: {
        async guardar() {
            let response = await axios.post('http://peliculas.localhost/api/pelicula', this.pelicula);
            if(response.status == 201) router.push('/peliculas');
        },
        cancelar() {
            router.push('/peliculas');
        },
        async getData() {
            let response = await axios.get('http://peliculas.localhost/api/genero');
            this.generos = response.data;
            this.generos.sort(function(a, b) {
                if(a.nombre > b.nombre) return 1;
                else if(a.nombre < b.nombre) return -1;
            });
            console.log(this.generos)
        }
    }
}
</script>