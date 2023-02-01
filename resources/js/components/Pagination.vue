<template>
  <div>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li v-if="pagination.currentPage > 1" class="page-item" role="button">
                <span role="button" class="page-link">Previous</span>
            </li>
            <li v-for="n in pagination.lastPage" :key="n" class="page-item" role="button">
                <span role="button" class="page-link">{{ n }}</span>
            </li>
            <li v-if="pagination.currentPage != pagination.lastPage" class="page-item" role="button">
                <span role="button" class="page-link">Next</span>
            </li>
        </ul>
    </nav>
  </div>
</template>

<script>

export default {
    name: "Pagination",
    props: ['pagination']
};

</script>

<style lang="scss" scoped>

</style>