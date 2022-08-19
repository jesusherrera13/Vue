<template>
    <h1>Generos</h1>
    <button @click="nuevo">Nuevo</button>
    <ul>
        <li v-for="genero in generos" @click="edit(genero)">{{ genero.nombre }}</li>
    </ul>
</template>

<script>
import axios from 'axios';
import router from '../../routes';

export default {
    data() {
        return {
            generos: []
        }
    },
    mounted() {
        this.getData();
    },
    methods: {
        async getData() {
            let response = await axios.get('http://peliculas.localhost/api/genero');
            this.generos = response.data;

            this.generos.sort(function(a, b) {

                if(a.nombre > b.nombre) {
                    return 1;
                }
                
                if(a.nombre < b.nombre) {
                    return -1;
                }
            });
        },
        nuevo() {
            router.push('/genero/nuevo');
        },
       edit(genero) {
            router.push('/genero/' + genero.id);
        }
    }
}
</script>