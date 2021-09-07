<template>
  <div>
    <div class="container">

      <div class="row">
        <div>
          <div class="row mb-3">
            <div>
              <div class="p-2 mb-lg-0 ml-5 row">
                <div class="col">
                  <nuxt-link to="/admin/vacancy-list" class="btn bg-info ml-2">
                    Back
                  </nuxt-link>
                </div>
                <div class="d-flex justify-content-end">
                  <button v-on:click="ApprovedVacancy() "  class="bg-warning border-0">
                    Approved
                  </button>
                </div>
                <table class="table table-borderless table-sm mb-0">
                  <tbody>
                  <tr>
                    <th scope="row">
                      Employeer:
                    </th>
                    <td>{{ vacancies.employee_name }}</td>
                  </tr>
                  <th scope="row">
                    Job type:
                  </th>
                  <td>{{ jobs.name }}</td>
                  <tr>
                    <th scope="row">
                      Aplication deadline:
                    </th>
                    <td>2021-10-31</td>
                  </tr>
                  <tr>
                    <th scope="row">
                      Location:
                    </th>
                    <td>{{ district.name }} , {{ cities.name }}</td>
                  </tr>
                  <tr>
                    <th scope="row">
                      Email address:
                    </th>
                    <td>{{ vacancies.employee_email }}</td>
                  </tr>
                  <tr>
                    <th scope="row">
                      Phone :
                    </th>
                    <td>{{ vacancies.telephone }}</td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="row justify-content-center ml-5">
            <div>
              <img id="myImage" alt="product-img" width="600px" height="1000px" src="~/assets/images/vacancy.png">
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</template>
<script>
export default {

  components: {
  },

  data () {
    return {
      vacancies: [],
      jobs: [],
      categories: [],
      district: [],
      cities: [],
      form: {
        is_approved: '1',
        approved_by_id: this.$auth.user.id,
        approved_at: '2021-09-01 08:36:22',
      }
    }
  },

  created () {
    try {
      this.$axios.get(`api/admin/vacancies/${this.$route.params.id}`)
        .then((response) => {
          this.vacancies = (response.data)
          this.categories = this.vacancies.category
          this.jobs = this.vacancies.jobs
          this.district = this.vacancies.district
          this.cities = this.vacancies.cities
          console.log(this.vacancies)
        })
    } catch (error) {
      // eslint-disable-next-line no-console
      console.log(error)
    }
  },
  methods: {
    async ApprovedVacancy() {
      try {
        await this.$axios.put(`api/admin/vacancies/${this.$route.params.id}`, this.form)
        await this.$router.replace({ path: '/admin/pending-vacancy-list' })
      } catch (error) {
        if (error.response.status === 422) {
          this.errors = error.response.data.errors
        }
      }
    }
  }
}
</script>
