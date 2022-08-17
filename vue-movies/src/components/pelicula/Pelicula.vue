<template>
    <h1>Películas</h1>
    <button @click="nuevo">Nuevo</button>
    <ul>
        <li v-for="pelicula in peliculas" @click="edit(pelicula.id)">{{ pelicula.titulo }} {{ pelicula.anio }}</li>
    </ul>
</template>
<script>

import axios from 'axios';
import router from '../../routes';

export default {
    data() {
        return {
            peliculas: []
        }
    },
    mounted() {
        this.getData()
    },
    methods: {
        async getData() {
            let response = await axios.get('http://peliculas.localhost/api/pelicula');
            this.peliculas = response.data;

            this.peliculas.sort(function(a, b) {

                if(a.titulo > b.titulo) return 1;
                if(a.titulo < b.titulo) return -1;
            });
        },
        nuevo() {
            router.push('/pelicula/nuevo');
        },
        edit(id) {
            router.push('/pelicula/' + id + '/edit');
        }
    }
}
</script>