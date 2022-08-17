<template>
    Título:
    <input type="text" v-model="pelicula.titulo">
    <br />
    Año:
    <input type="number" v-model="pelicula.anio">
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
                anio: null
            }
        }
    },
    methods: {
        async guardar() {
            let response = await axios.post('http://peliculas.localhost/api/pelicula', this.pelicula);
            console.log(response)
            if(response.status == 201) router.push('/peliculas');
        },
        cancelar() {
            router.push('/peliculas');
        }
    }
}
</script>