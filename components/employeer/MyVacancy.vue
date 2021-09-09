<template>
  <div>
    <div class="container">
      <b-form v-for="(vacancy, index) in vacancies.data" :key="index"  v-if="vacancy.user_id == $auth.user.id ">
        <div>
        
          <div class="card shadow">
            <div class="card-body pb-1">
              <nuxt-link :to="'/employeer/myaccount/myvacancy-list/' + vacancy.id">
              <div class="row">
                <div class="col-md-6">
                  <div>
                    <h4>
                      {{ vacancy.title }}
                    </h4>
                  </div>
                  <div class="text-muted">
                    <p>{{ vacancy.employee_name }}</p>
                  </div>
                </div>
                <div class="col-md-4 mt-2 text-muted">
                  <p>{{ vacancy.district.name }} , {{ vacancy.cities.name }}</p>
                </div>
                <div class="col-md-2 text-muted">

                  <div class="d-flex">
                    <div class="rounded text-mute">
                      {{ vacancy.jobs.name }}
                    </div>
                  </div>

                  <div v-if="vacancy.is_approved == 0 ">
                    <div>
                      <div class="btn-sm">
                        <h6 class="text-warning">Pending</h6>
                      </div>
                    </div>
                  </div>
                  <div v-else>
                    <div>
                      <div class="btn-sm">
                        <h6 class="text-success">Approved</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </nuxt-link>
            </div>
            <div class="d-flex justify-content-end">
              <nuxt-link :to="'/employeer/myaccount/myvacancy-list/edit/' + vacancy.id">
                <b-button
                      class=" ml-2 bg-success btn-sm mb-2 mr-4"
                      type="submit"
                    >
                      Vacancy Edit
                    </b-button>
              </nuxt-link>
            </div>
          </div>
        </div>
        
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
