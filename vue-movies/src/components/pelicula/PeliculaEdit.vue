<template>
    Título:
    <input type="text" v-model="pelicula.titulo">
    <br />
    Año:
    <input type="text" v-model="pelicula.anio">
    <br />
    Género
    <select multiple v-model="pelicula.generos">
        <option v-for="genero in generos" v-bind:value="genero.id">{{ genero.nombre }}</option>
    </select>
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
        async getData() {
            
            let response = await axios.get('http://peliculas.localhost/api/genero');
            
            this.generos = response.data;
            this.generos.sort(function(a, b) {
                if(a.nombre > b.nombre) return 1;
                else if(a.nombre < b.nombre) return -1;
            });
            
            response = await axios.get('http://peliculas.localhost/api/pelicula/' + this.$route.params.id);
            
            this.pelicula = response.data;
            let tmp = response.data.generos;
            console.log(tmp)
            // console.log(response.data)
            this.pelicula.generos = [];
            
            for(var i in tmp) {
                this.pelicula.generos.push({
                    id: tmp[i].genero_id
                })
            }

            console.log(this.pelicula)
        },
        async guardar() {
            let response = await axios.put('http://peliculas.localhost/api/pelicula/' + this.$route.params.id, this.pelicula);
            if(response.status == 200) router.push('/peliculas');
        }
    }
}
</script>