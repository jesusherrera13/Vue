<template>
    <div class="container">
        <div>
            <div>
                <ul v-if="errors.length">
                    <li v-for="error in errors"> {{ error }}</li>
                </ul>
            </div>
            Title
            <input type="text" v-model="todo.title">
            <br />
            Categorie
            <select v-model="todo.categorie_id">
                <option></option>
                <option v-for="categorie in categories" :value="categorie.id">{{ categorie.name }}</option>
            </select>
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
            categories: [],
        }
    },
    mounted() {
        this.getData();
        this.getCategories();
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
            this.errors = [];

            if(!this.todo.title) this.errors.push('Write the title');
            if(!this.todo.categorie_id) this.errors.push('Select the categorie');

            if(this.errors.length) return false;
            
            let response;
            
            if(this.todo.id) response = await axios.put('http://127.0.0.1:8000/api/todo/' + this.todo.id, 
                                                    { id: this.todo.id, title: this.todo.title,categorie_id: this.todo.categorie_id, done: this.todo.done }
                                                )
                                                .catch(function(error) {
                                                    console.log(error.toJSON());
                                                });

            else {
                let errors = [];
                response = await axios.post('http://127.0.0.1:8000/api/todo', this.todo)
                                        .catch(function(error) {
                                            errors = error.response.data.errors;
                                        });
                
                let errors_ = [];
                
                Object.keys(errors).forEach((e, i) => {
                    errors_.push(errors[e][0]);
                });

                this.errors = errors_;
            }

            if(response.status == 201 || response.status == 200) {
                this.getData();
                if(response.status == 201) this.todo = {};
            }
        },
        edit(todo) {
            this.todo = todo;
        },
        newTodo(){
            this.todo = {};
        }, 
        async addComment() {
            
            let response = await axios.post('http://127.0.0.1:8000/api/comment', {todo_id: this.todo.id, comment: this.todo.comment})
                                        .catch(function(error) {
                                            console.log(error.toJSON());
                                        });

            if(response.status == 201) {
                this.getData();
                this.todo.comment = '';
            }
        },
        async getCategories() {
            let response = await axios.get('http://127.0.0.1:8000/api/categorie');
            this.categories = response.data.sort((a, b) => {
                if(a.name > b.name) return 1;
                if(a.name < b.name) return -1;
            });
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