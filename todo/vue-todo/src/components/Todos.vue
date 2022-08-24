<template>
    <div class="container">
        <ul v-if="errors.length">
            <li v-for="error in errors"> {{ error }}</li>
        </ul>
        <div>
            Title
            <input type="text" v-model="todo.title">
            <br />
            <button @click="save">{{ todo.id ? 'Save' : 'Add' }}</button>
            <button @click="newTodo">New</button>
            <div v-if="todo.id">

                Comments
                <br />
                <textarea v-model="todo.comment"></textarea>
                <br />
                <button @click="addComment">Add comment</button>
                <input type="checkbox" v-model="todo.done" v-bind:value="1" >
            </div>
        </div>
        <div >
            <Todo v-for="todo in data" @click="edit(todo)" v-bind:todo="todo" />
        </div>
    </div>
</template>
<script>

import axios from 'axios';
import Todo from './Todo.vue';

export default {
    data() {
        return {
            todo: {},
            todos: [],
            errors: [],
            data: [],
        }
    },
    mounted() {
        this.getData();
    },
    methods: {
        async getData() {
            let response = await axios.get('http://127.0.0.1:8000/api/todo');
            this.todos = response.data;
            this.data = this.todos;
            this.data.sort(function(a, b) {
                if(a.created_at > b.created_at) return -1;
                if(a.created_at < b.created_at) return 1;
            });
        },
        async save() {

            if(this.todo.title) {
                let response;
                if(this.todo.id) response = await axios.put('http://127.0.0.1:8000/api/todo/' + this.todo.id, { id: this.todo.id, title: this.todo.title, done: this.todo.done });
                else response = await axios.post('http://127.0.0.1:8000/api/todo', this.todo);

                if(response.status == 201) {
                    this.getData();
                    this.todo = {};
                }
                else if(response.status == 200) {
                    this.getData();
                }
            }
        },
        edit(todo) {
            this.todo = todo;
        },
        newTodo(){
            this.todo = {};
        }, 
        async addComment() {
            
            let response = await axios.post('http://127.0.0.1:8000/api/comment', {todo_id: this.todo.id, comment: this.todo.comment});

            if(response.status == 201) {
                this.getData();
                this.todo.comment = '';
            }
        }
    },
    components: {
        Todo
    } 
}
</script>
<style scoped>
.container {
    display: flex;
    flex-direction: row;
}

.container > div {
    flex: 1 1 auto;
}

.container > :nth-child(1) {
    width: 200px;
}
</style>