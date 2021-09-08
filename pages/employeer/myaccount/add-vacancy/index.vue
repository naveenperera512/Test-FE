<template>
  <div class="container card mt-3">
    <div class="row container card-body ">
      <div class="col-lg-12">
        <div>
          <h4 class="header-title mb-3">
            <NuxtLink to="/employeer/myaccount">
              <<- Back
            </NuxtLink>
            <span class="mr-3">
              Fill in the details
            </span>
          </h4>
          <h6 class="sub-header">
            About the job
          </h6>

          <b-form @submit.prevent="vacancies">

            <!-- title-->
            <b-form-group label-for="title">
              <template #label>
                Title
              <span class="text-danger">*</span>
              </template>
              <b-form-input
                id="title"
                v-model="form.title"
                type="text"
                :state="errors && errors.title ? false : null"
                placeholder="Some text value..."
              />
              <b-form-invalid-feedback
                v-if="errors && errors.title"
                id="title-feedback"
              >
                {{ errors.title[0] }}
              </b-form-invalid-feedback>
            </b-form-group>

            <!-- employee name-->
            <b-form-group class="col-md-6" label-for="input-employee_name">
              <template #label>
                Employeer name
                  <span class="text-danger">*</span>
              </template>
              <b-form-input
                id="input-employee_name"
                v-model="form.employee_name"
                type="text"
                :state="errors && errors.employee_name ? false : null"
                placeholder="Enter Name"
              />
              <b-form-invalid-feedback
                v-if="errors && errors.employee_name"
                id="input-employee_name-feedback"
              >
                {{ errors.employee_name[0] }}
              </b-form-invalid-feedback>
            </b-form-group>

            <!-- email address-->
            <b-form-group class="col-md-6" label-for="employee_email">
              <template #label>
                Email Address
                    <span class="text-danger">*</span>
              </template>
              <b-form-input
                id="employee-email"
                v-model="form.employee_email"
                type="email"
                :state="errors && errors.employee_email ? false : null"
                placeholder="Enter your email"
              />
              <b-form-invalid-feedback
                v-if="errors && errors.employee_email"
                id="employee-email-feedback"
              >
                {{ errors.employee_email[0] }}
              </b-form-invalid-feedback>
            </b-form-group>

            <!-- telephone-->
            <b-form-group class="col-md-6" label-for="telephone">
              <template #label>
                Telephone
                    <span class="text-danger">*</span>
              </template>
              <b-form-input
                id="telephone"
                v-model="form.telephone"
                type="number"
                :state="errors && errors.telephone ? false : null"
                placeholder="(xx) xxx xxxx xxx"
              />
              <b-form-invalid-feedback
                v-if="errors && errors.telephone"
                id="telephone-feedback"
              >
                {{ errors.telephone[0] }}
              </b-form-invalid-feedback>
            </b-form-group>

            <!-- button -->
            <div class="form-group mb-0 d-flex justify-content-end">
              <button
                class="btn btn-success "
                type="submit"
              >
                Post vacancy
              </button>
            </div>
          </b-form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

/**
 * Checkout component
 */
export default {
  components: {
  },
  data() {
    return {
      errors: {},
      form: {
        title: '',
        user_id: '3',
        slug: 'a',
        category_id: '1',
        job_type_id: '1',
        district_id: '1',
        district_city_id: '1',
        employee_name: '',
        employee_email: '',
        telephone: ''
      }
    }
  },

  methods: {
    async vacancies () {
      try {
        await this.$axios.get('sanctum/csrf-cookie')
        await this.$axios.post('api/employee/vacancies', this.form)
        await this.$router.replace({ path: '/employeer/myaccount' })
      } catch (error) {
        if (error.response.status === 422) {
          this.errors = error.response.data.errors
        }
      }
    }
  }
}

</script>
