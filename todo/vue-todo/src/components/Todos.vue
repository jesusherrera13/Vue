<template>
    Title
    <input type="text" v-model="todo.title">
    <br />
    <button @click="add">Add</button>
    <br />
    <div >
        <Todo v-for="todo in todos" @click="edit(todo)" v-bind:todo="todo" />
    </div>
</template>
<script>

import axios from 'axios';
import Todo from './Todo.vue';

export default {
    data() {
        return {
            todo: {},
            todos: []
        }
    },
    mounted() {
        this.getData();
    },
    methods: {
        async getData() {
            let response = await axios.get('http://127.0.0.1:8000/api/todo');
            this.todos = response.data;
        },
        async add() {
            let response = await axios.post('http://127.0.0.1:8000/api/todo', this.todo);
            if(response.status == 201) {

                this.getData();
                this.todo = {};
            }
        },
        edit(todo) {
            this.todo = todo;
        }
    },
    components: {
        Todo
    } 
}
</script>