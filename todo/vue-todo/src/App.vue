<template>
    <h1>Todos</h1>
    <div>
        <router-link to="/">Todos</router-link>
        <router-link to="/categorie">Categories</router-link>
    </div>
    <div>
        <router-view></router-view>
    </div>
</template>
<script>
export default {
}
</script>