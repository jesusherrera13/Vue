<template>
    <div>
        <ul v-if="errors.length">
            <li :for="error in error">{{ error }}</li>
        </ul>
        <div>
            Title
            <input type="text" v-model="category.name">
            <br />
            <button @click="save">Save</button>
        </div>
        <div>
            <h3>Categories</h3>
            <div v-for="item in categories">{{ item.name }}</div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';

export default {
    data() {
        return {
            category: {
                name: null
            },
            categories: [],
            errors: []
        }
    },
    mounted() {
        this.getData();
    },
    methods: {
        async getData() {

            let response = await axios.get('http://127.0.0.1:8000/api/categoria');

            this.categories = response.data;
            this.categories.sort(function(a, b) {
                if(a.name > b.name) return 1;
                if(a.name < b.name) return -1;
            });
        },
        async save() {
            console.log(this.category)
            if(!this.category.name) this.errors.push('Write down the category name');

            if(this.errors.length > 0) return false;

            let response = await axios.post('http://127.0.0.1:8000/api/categoria', this.category);
            if(response.status == 201) this.getData();

            this.category = {name: null};
        }
    }
}
</script>