<template>
    <div>
        <Loader v-if="isLoading"/>
        <ul v-if="posts.length">
            <li v-for="elem in posts" :key="elem.id">{{elem.title}}</li>
        </ul>
        <p v-else>Non ci sono posts</p>
        <Pagination :pagination="pagination"/>
    </div>
</template>

<script>

    import Loader from '../Loader.vue';
    import Pagination from '../Pagination.vue'

    export default {
        name: 'PostsList',
        // props: ['posts', 'isLoading', 'pagination'],
        components: {
            Loader,
            Pagination
        },

        data() {
            return {
                posts: [],
                isLoading: false,
                pagination: {},
            }
        },

            mounted(){
            this.getPosts();
        },
        
        methods: {
            getPosts(page = 1){
                this.isLoading = true
                axios.get('http://localhost:8000/api/posts?page=' + page)
                .then((res) => {
                    console.log(res.data);
                    // this.posts = res.data.data;
                    const{data, current_page, last_page} = res.data;
                    this.posts = data;
                    this.pagination = {
                        lastPage: last_page,
                        currentPage : current_page
                    }
                
                }).catch(err =>{
                    console.log(err)
                }).then(() => {
                    this.isLoading = false
                });
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>