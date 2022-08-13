<template>
    The App
    <Header :genres="genres" @show-movies="showMovies" />
    <ul>
        <li v-for="movie in movies">
            {{ movie.title }}
        </li>
    </ul>
</template>

<script>

import { ref } from 'vue';
import axios from 'axios'

import database from './database.js';
import Header from './components/Header.vue';

let movies_ = ref({});

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