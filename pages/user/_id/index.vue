<template>
    <div class="container">
      <div class="row card mt-2 shadow">
        <div>
          <div class="row mb-3">
            <div>
              <div class="p-2 mb-lg-0 ml-5">
                <div class="row">
                  <div>
                    <div class="row mb-3">
                      <div>
                        <div class="p-2 ml-5">
                          <div>
                            <nuxt-link class="btn bg-info ml-2" to="/user">
                              Back
                            </nuxt-link>
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
                  </div>
                </div>
                <div class="row justify-content-center ml-5">
                  <div>
                    <img id="myImage" alt="product-img" height="1000px" src="~/assets/images/vacancy.png" width="600px">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</template>
<script>
export default {

  components: {},

  data() {
    return {
      vacancies: [],
      jobs: [],
      categories: [],
      district: [],
      cities: []
    }
  },

  created() {
    try {
      this.$axios.get(`api/vacancies/${this.$route.params.id}`)
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
  }
}
</script>
