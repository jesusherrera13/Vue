<template>
    <h1>The App</h1>
    <div>
        <router-link to="/">Todos</router-link>
        <router-link to="/categoria">Categoria</router-link>
    </div>
    <div>
        <router-view></router-view>
    </div>
</template>
<script>
export default {
}
</script>