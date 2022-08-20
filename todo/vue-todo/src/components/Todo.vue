<template>
    <div>
        <div class="todo">
            <span class="item title">
                {{ todo.title }}
            </span>
            <span class="item date">
                {{ dateFormat }}
            </span>
        </div>
        <div class="comment">Comments</div>
    </div>
</template>
<script>
export default {
    props: {
        todo: {
            type: Object
        }
    },
    computed: {
        dateFormat() {
            return this.todo.created_at.substring(0, 10);
        }
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
}
.date {
    color: #888;
}
.comment {
    font-size: 12px;
}
</style>