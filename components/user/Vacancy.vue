<template>
  <div>
    <div class="row bg-info">
      <b-col
        md="1"
      />
      <b-col
        md="10"
      >
        <div>
          <div class="">
            <div class=" mb-3 ">
              <div class="form-row d-flex justify-content-center">
                <b-form-group class="col-md-3 text-white " label="Select Job Category" label-for="inputState">
                  <select class="form-control ">
                    <option>
                      Please select an option
                    </option>
                    <option v-for="(category, index) in categories" :key="index">
                      {{ category.name }}
                    </option>
                  </select>
                </b-form-group>
                <b-form-group class="col-md-3 text-white" label="Select Job Type" label-for="inputState">
                  <select class="form-control">
                    <option>
                      Please select an option
                    </option>
                    <option v-for="(jobtype, index) in jobtypes" :key="index">
                      {{ jobtype.name }}
                    </option>
                  </select>
                </b-form-group>
                <b-form-group class="col-md-3 text-white" label="Select District" label-for="inputState">
                  <select class="form-control">
                    <option>
                      Please select an option
                    </option>
                    <option v-for="(district, index) in districts" :key="index">
                      {{ district.name }}
                    </option>
                  </select>
                </b-form-group>
              </div>
            </div>
          </div>
        </div>
      </b-col>
      <b-col
        md="1"
      />
    </div>
  <div class="container">
    <b-form v-for="(vacancy, index) in vacancies.data" :key="index" >
      <nuxt-link :to="'/user/' + vacancy.id">
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
                {{ vacancy.created_at }}
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
    this.getDistrictList()
    this.getCategorytList()
    this.getJobTypeList()
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
    getCategorytList () {
      try {
        this.$axios.get('api/categories')
          .then((response) => {
            this.categories = (response.data).data
          })
      } catch (error) {
        // eslint-disable-next-line no-console
        console.log(error)
      }
    },
    getJobTypeList () {
      try {
        this.$axios.get('api/jobTypes')
          .then((response) => {
            this.jobtypes = (response.data).data
          })
      } catch (error) {
        // eslint-disable-next-line no-console
        console.log(error)
      }
    },
    getDistrictList () {
      try {
        this.$axios.get('api/districts')
          .then((response) => {
            this.districts = (response.data).data
          })
      } catch (error) {
        // eslint-disable-next-line no-console
        console.log(error)
      }
    }
  }
}
</script>
