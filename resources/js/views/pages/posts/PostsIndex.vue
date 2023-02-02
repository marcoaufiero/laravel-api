<template>
    <div class="ms-background-dark">
        <PostsList/>
    </div>
</template>

<script>

    import PostsList from "../../../components/posts/PostsList.vue"

    export default {
        name: 'PostsIndex',
        components: {
            PostsList
        }
    }
</script>

<style lang="scss" scoped>
    .ms-background-dark{
        background-color: #95a1bb;
        height: calc(100vh - 56px);
    }
</style>