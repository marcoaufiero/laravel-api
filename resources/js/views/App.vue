<template>
    <div class="container my-5">
        <!-- <PostsList/> -->
        <router-view></router-view>
    </div>
</template>

<script>

import PostsList from "../components/posts/PostsList.vue"

export default {
    name:"App",
    components:{
        PostsList
    },
    
}


</script>

<style>

</style>