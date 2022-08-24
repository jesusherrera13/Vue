<template>
    <div>
        <div class="todo">
            <span class="item title">
                {{ todo.title }}
            </span>
            <span class="item date">
                {{ dateFormat }}
            </span>
            <span class="item date">
                {{ timeFormat }}
            </span>
            <span class="item">
                <input type="checkbox" :value="1" :model="todo.done" :checked="todo.done" @click="done(todo)">
            </span>
        </div>
        <div class="comment" v-for="comment in todo.comments">{{ comment.comment }}</div>
    </div>
</template>
<script>
import axios from 'axios';

export default {
    props: {
        todo: {
            type: Object
        }
    },
    computed: {
        dateFormat() {
            return this.todo.created_at.substring(0, 10);
        },
        timeFormat() {
            return this.todo.created_at.substring(11, 19);
        }
    },
    methods: {
        async done(todo) {
            // console.log(todo)
            let response = await axios.put('http://127.0.0.1:8000/api/todo/' + todo.id, {id: todo.id, title: todo.title, done: todo.done});
            if(response.status == 200) {
                
            }
        },
        
    }
}
</script>

<style scoped>
.todo {
    display: flex;
}

.item {
    flex: 1 1 auto;
}

.title {
    font-size: 18px;
    font-weight: bold;
    width: 100px;
}
.date {
    color: #888;
}
.comment {
    font-size: 12px;
}
</style>