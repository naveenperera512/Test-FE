<template>
  <div>
    <div class="container">
      <div class="row card mt-3 shadow">
          <div class="col-12">
              <div class="p-2 mb-lg-0 ml-2">
                <div class="col-md-12">
                  <nuxt-link to="/employeer/myaccount">
                    <b-button
                      class="bg-primary btn-sm mt-3"
                      type="submit"
                    >
                      Back
                    </b-button>
                  </nuxt-link>
                  <div class="d-flex justify-content-end mt-2">
                    
                    <b-button
                      class=" ml-2 bg-danger btn-sm"
                      type="submit"
                    >
                      Vacancy Delete
                    </b-button>
                  </div>
                </div>
                <div class="row mb-2 ml-1">
                <div>
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
                    <td>{{ vacancies.deadline_date }}</td>
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
                  <tr>
                    <th scope="row">
                      Description:
                    </th>
                    <td>{{ vacancies.description }}</td>
                  </tr>
                  </tbody>
                </table>
                </div>
                </div>
              </div>
          <div class="row justify-content-center mb-4">
            <div class="shadow-lg">
              <img id="myImage" alt="product-img" width="500px" height="800px" src="~/assets/images/vacancy.png">
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
      cities: []
    }
  },

  created () {
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
