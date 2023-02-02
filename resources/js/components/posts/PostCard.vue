<template>
    <div class="container my-5">
        <div class="ms-card">
            <h1>{{post.title}}</h1>
            <p>{{post.body}}</p>
        </div>
    </div>
</template>

<script>
    
export default {
    
    name: "PostCard",

    data() {
        return {
            post: null
        }
    },

    mounted() {
        this.getPost();
    },

    methods: {
        getPost() {
        
        axios.get("http://localhost:8000/api/posts/" + this.$route.params.id)
            .then((res) => {
                console.log(res.data);
                this.post = res.data;
            })
            .catch((err) => {
            console.log(err);
            })
        },
    },
}
</script>

<style lang="scss" scoped>

</style>