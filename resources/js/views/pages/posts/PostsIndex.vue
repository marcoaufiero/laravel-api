<template>
    <div>
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

</style>