<template>
  <div>
    <div class="container">
      <b-form v-for="(vacancy, index) in vacancies.data" :key="index" >
        <nuxt-link :to="'/employeer/' + vacancy.id">
          <div class="card mt-2">
            <div class="card-body pb-1">
              <div class="row">
                <div class="col-md-7">
                  <div class="ml-2">
                    <h4 class="bx-bold">
                      {{ vacancy.title }}
                    </h4>
                  </div>
                  <div class="ml-3">
                    <p>{{ vacancy.employee_name }}</p>
                  </div>
                </div>
                <div class="col-md-2 mt-3">
                  <p>{{ vacancy.district.name }} , {{ vacancy.cities.name }}</p>
                </div>
                <div class="col-md-3 ">
                  <div class="d-flex justify-content-end">
                    {{ vacancy.created_at }}
                  </div>
                  <div class="d-flex justify-content-end mr-3 mt-2">
                    <div class="alert alert-primary" role="alert">
                      {{ vacancy.jobs.name }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </nuxt-link>
      </b-form>
      <div class="d-flex justify-content-center">
        <LaravelVuePagination :data="vacancies" @pagination-change-page="getVacancies" class="pagination pagination-rounded">
          <span slot="prev-nav">&lt; Previous</span>
          <span slot="next-nav">Next &gt;</span>
        </LaravelVuePagination>
      </div>
    </div>
  </div>
</template>

<script>
import LaravelVuePagination from 'laravel-vue-pagination'
import axios from "vue-tour";

export default {
  data() {
    return {
      vacancies: {},
      categories: {},
      jobtypes: {},
      districts: {}
    }
  },
  components:{
    LaravelVuePagination
  },
  created() {
    this.getVacancies()
  },
  methods: {
    getVacancies(page=1) {
      try {
        this.$axios.get('api/vacancies?page=' + page)
          .then((response) => {
            this.vacancies = (response.data)
            console.log(this.vacancies)
          })
      } catch (error) {
        // eslint-disable-next-line no-console
        console.log(error)
      }
    },



  }
}
</script>
