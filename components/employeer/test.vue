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
                  <select v-model="category_id" class="form-control ">
                    <option value="">-- Please select an option --</option>
                    <option v-for="category in categories" :value="category.id">
                      {{ category.name }}
                    </option>
                  </select>
                </b-form-group>
                <b-form-group class="col-md-3 text-white" label="Select Job Type" label-for="inputState">
                  <select v-model="job_type_id" class="form-control">
                    <option value="">-- Please select an option --</option>
                    <option v-for="jobtype in jobtypes" :value="jobtype.id">
                      {{ jobtype.name }}
                    </option>
                  </select>
                </b-form-group>
                <b-form-group class="col-md-3 text-white" label="Select District" label-for="inputState">
                  <select  v-model="district_id" class="form-control">
                    <option value="">-- Please select an option --</option>
                    <option v-for="district in districts" :value="district.id">
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
      <b-form v-for="vacancy in vacancies.data" :key="vacancy.id">
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
      category_id: '',
      job_type_id: '',
      district_id: '',
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
  mounted (){
    try {
      this.$axios.get('api/categories')
        .then((response) => {
          this.categories = (response.data).data
        });
      this.getVacancies();
    } catch (error) {
      // eslint-disable-next-line no-console
      console.log(error)
    }
    try {
      this.$axios.get('api/jobTypes')
        .then((response) => {
          this.jobtypes = (response.data).data
        });
      this.getVacancies();
    } catch (error) {
      // eslint-disable-next-line no-console
      console.log(error)
    }
    try {
      this.$axios.get('api/districts')
        .then((response) => {
          this.districts = (response.data).data
        });
      this.getVacancies();
    } catch (error) {
      // eslint-disable-next-line no-console
      console.log(error)
    }

  },
  watch: {
    category_id(value) { this.getVacancies();},
    job_type_id(value) { this.getVacancies();},
    district_id(value) { this.getVacancies();}
  },
  methods: {
    getVacancies(page=1) {
      try {
        this.$axios.get('api/vacancies?page=' + page
          + '&category_id=' + this.category_id
          + '&job_type_id=' + this.job_type_id
          + '&district_id=' + this.district_id )
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
