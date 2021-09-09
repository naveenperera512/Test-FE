<template>
  <div>
    <div class="container">
      <b-form v-for="(vacancy, index) in vacancies.data" :key="index"  v-if="vacancy.user_id == $auth.user.id ">
        <nuxt-link :to="'/employeer/myaccount/myvacancy-list/' + vacancy.id">
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
                  <div v-if="vacancy.is_approved == 0 ">
                    <button v-on:click="peding(vacancy.id) "  class="bg-warning border-0">
                      <div class="mx-4 text-white">
                        pending
                      </div>
                    </button>
                  </div>
                  <div v-else>
                    <button v-on:click=""  class="bg-success border-0">
                      <div class="mx-4 text-white">
                        Approved
                      </div>
                    </button>
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
        this.$axios.get('api/employee/vacancies?page=' + page)
          .then((response) => {
            this.vacancies = (response.data)
          })
      } catch (error) {
        // eslint-disable-next-line no-console
        console.log(error)
      }
    }
  }
}
</script>
