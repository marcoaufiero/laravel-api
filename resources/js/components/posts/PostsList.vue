<template>
  <div>
    <Loader v-if="isLoading" />
    <div class="card-container my-5">
         
        <div class="ms-card" v-for="elem in posts" :key="elem.id">
            <h3 class="ms-title">{{ elem.title }}</h3>
            <div>
                <span>Categoria: </span>
                <span v-if="elem.category">{{ elem.category.name }}</span>
                <span v-else>Nessuna</span>
            </div>
            <div>
                <span>Tags:</span>
                <ol v-if="elem.tags.length > 0">
                    <li v-for="tag in elem.tags" :key="tag.id">{{ tag.name }}</li>
                </ol>
            <span v-else>Nessuno</span>
            </div>
        </div>

    </div>

    <Pagination @on-page-change="getPosts" :pagination="pagination" />
  </div>
</template>

<script>
import Loader from "../Loader.vue";
import Pagination from "../Pagination.vue";

export default {
  name: "PostsList",
  // props: ['posts', 'isLoading', 'pagination'],
  components: {
    Loader,
    Pagination,
  },

  data() {
    return {
      posts: [],
      isLoading: false,
      pagination: {},
    };
  },

  mounted() {
    this.getPosts();
  },

  methods: {
    getPosts(page = 1) {
      this.isLoading = true;
      axios
        .get("http://localhost:8000/api/posts?page=" + page)
        .then((res) => {
          console.log(res.data);
          // this.posts = res.data.data;
          const { data, current_page, last_page } = res.data;
          this.posts = data;
          this.pagination = {
            lastPage: last_page,
            currentPage: current_page,
          };
        })
        .catch((err) => {
          console.log(err);
        })
        .then(() => {
          this.isLoading = false;
        });
    },
  },
};
</script>

<style lang="scss" scoped>

    .card-container{
        display: flex;
        flex-wrap: wrap;
        gap: 20px;

        .ms-card{
            width: calc((100% / 5) - 20px);
            background-color: #F6A800;
            border-radius: 10px;
            border: 1px solid black;
            padding: 10px;
            height: 300px;

            .ms-title{
                color: #E3000F;
            }
        }
    }

</style>