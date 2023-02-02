<template>
    <div>
        <HeaderComp/>
        <router-view></router-view>
    </div>
</template>

<script>

import HeaderComp from "../components/HeaderComp.vue"
import PostsList from "../components/posts/PostsList.vue"

export default {
    name:"App",
    components:{
        PostsList,
        HeaderComp
    },
    
}


</script>

<style>

</style>