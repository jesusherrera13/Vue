<template>
    Todos List
</template>
<script>

import axios from 'axios';

export default {
    data() {
        return {
            todos: []
        }
    },
    mounted() {
        this.getData();
    },
    methods: {
        async getData() {
            let response = await axios.get('http://127.0.0.1:8000/api/todo');
        }
    }
}
</script>