<template>
    The App

    <router-link class="menu-item" to="/">Home</router-link>
    <router-link class="menu-item" to="/peliculas">Peliculas</router-link>
    <router-link class="menu-item" to="/generos">Generos</router-link>
    <router-link class="menu-item" to="/actores">Actores</router-link>
    
    <div>
        <router-view></router-view>
    </div>

    
    <ul>
        <li v-for="movie in movies">
            {{ movie.title }}
        </li>
    </ul>
</template>

<script>

import axios from 'axios'

import database from './database.js';
import Header from './components/Header.vue';

const getData = async () => {

    // http://www.omdbapi.com/?apikey=[yourkey]&

    // let response = await axios.get('http://www.omdbapi.com/?apikey=[yourkey]&/?i=tt3896198&apikey=2dcfded2');
    let response = await axios.get('http://www.omdbapi.com/?apikey=2dcfded2&t=interstellar');
    console.log(response.data)
};

export default {
    data() {
        return {
            genres: [],
            movies: []
        }
    },
    created() {
        this.genres = database.genres;
        this.genres.sort();
        getData();
    },
    components: {
        Header
    },
    methods: {
        showMovies(genre) {

            this.movies = [];

            let tmp = [];
            
            for(var i in database.genres) {
                for(var j in database.movies) {
                    for(var k in database.movies[j].genres) {
                        if(genre == database.movies[j].genres[k]) {
                            if(tmp.indexOf(database.movies[j].title) < 0) {
                                tmp.push(database.movies[j].title);
                                this.movies.push(database.movies[j]);
                            }
                        }
                    }
                }
            }
        }
    }
}
</script>
<style scoped>
.menu-item {
    text-decoration: none;
    margin: 0px  3px 0px 3px;
    color: black;
}

.menu-item:hover {
    color: goldenrod;
    text-decoration: underline;
}
</style>