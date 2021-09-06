<template>
  <div class="container">
    <table>
      <tr>
        <th>Id</th>
        <th>Name</th>
      </tr>
      <tr v-for="(category, index) in categories.data " :key="index">
        <td>{{  category.id }}</td>
        <td>{{ category.name }}</td>
      </tr>
    </table>
    <LaravelVuePagination :data="categories" @pagination-change-page="getCategories">
      <span slot="prev-nav">&lt; Previous</span>
      <span slot="next-nav">Next &gt;</span>
    </LaravelVuePagination>
  </div>
</template>

<script>
import LaravelVuePagination from 'laravel-vue-pagination'
import axios from "vue-tour";

export default {
  data() {
    return {
      categories: {}
    }
  },
  components:{
    LaravelVuePagination
  },
  created() {
    this.getCategories()
  },
  methods: {
    getCategories(page=1) {
      try {
        this.$axios.get('api/categories?page=' + page)
          .then((response) => {
            this.categories = (response.data)
            console.log(this.categories)
          })
      } catch (error) {
        // eslint-disable-next-line no-console
        console.log(error)
      }
    }
  }
}
</script>
