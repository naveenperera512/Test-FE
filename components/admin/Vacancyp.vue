<template>
  <div>
    <div class="container">
      <b-form v-for="(vacancy, index) in vacancies.data" :key="index" >
        <nuxt-link :to="'/admin/pending-vacancy-list/' + vacancy.id">
          <div class="card mt-2 shadow">
            <div class="card-body pb-1">
              <div class="row">
                <div class="col-md-6">
                  <div class="ml-2">
                    <h4>
                      {{ vacancy.title }}
                    </h4>
                  </div>
                  <div class="ml-3 text text-muted">
                    <p>{{ vacancy.employee_name }}</p>
                  </div>
                </div>
                <div class="col-md-3 mt-3 text-muted">
                  <img class="mt-n1" height="30" src="~/assets/images/marker.png" width="30">
                  {{ vacancy.district.name }} , {{ vacancy.cities.name }}
                </div>
                <div class="col-md-3 text-muted">
                  <div class="d-flex justify-content-end">
                    <div class="text-danger">Expire date : </div>{{ vacancy.deadline_date}}
                  </div>
                  <div class="d-flex justify-content-end mr-3 mt-2">
                    <div class="alert alert-success" role="alert">
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
        this.$axios.get('api/admin/pendingVacancies?page=' + page)
          .then((response) => {
            this.vacancies = (response.data)
          })
      } catch (error) {
        // eslint-disable-next-line no-console
        console.log(error)
      }
    },

  }
}
</script>
