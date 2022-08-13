<template>
    <div class="header">
        <span class="menu-item" v-for="genre in genres" @click="$emit('show-movies', genre)">
            {{ genre }}
        </span>
    </div>
</template>
<script>
export default {
    props: {
        genres: [Array, Object]
    }
}
</script>
<style scoped>
.menu-item {
    font-size: 14px;
    padding: 3px;
}
</style>