<template>
  <div class="row mt-3">
    <b-col
      md="1"
    />
    <b-col
      md="10"
    >
      <div class="card">
      <div class="col-12 my-3">
        <h5>
          <nuxt-link to="/admin/jobType" class="btn bg-info ml-2">
            Back
          </nuxt-link><span class="ml-2">Add Job Type</span>
        </h5>
      </div>

      <div class="col-sm-12 col-md-11 card-body">
        <b-form
          @submit.prevent="addJobTypeInformation"
        >
          <!-- name -->
          <b-form-group label-for="name">
            <template #label>
              JobType Name <span class="text-danger">*</span>
            </template>
            <b-form-input
              id="name"
              v-model="form.name"
              type="text"
              :state="errors && errors.name ? false : null"
              placeholder="Enter name"
              required
            />
            <b-form-invalid-feedback
              v-if="errors && errors.name"
              id="name-feedback"
            >
              {{ errors.name[0] }}
            </b-form-invalid-feedback>
          </b-form-group>
          <!-- slug -->
          <b-form-group label-for="slug">
            <template #label>
              Slug <span class="text-danger">*</span>
            </template>
            <b-form-input
              id="slug"
              v-model="form.slug"
              type="text"
              :state="errors && errors.slug ? false : null"
              placeholder="Enter slug"
              required
            />
            <b-form-invalid-feedback
              v-if="errors && errors.slug"
              id="slug-feedback"
            >
              {{ errors.slug[0] }}
            </b-form-invalid-feedback>
          </b-form-group>

          <!-- button-->
          <div
            class="d-flex justify-content-end"
          >
            <b-button
              type="submit"
              variant="primary"
              class="mt-n2 ml-2"
            >
              Save
            </b-button>
          </div>
        </b-form>
      </div>
      </div>
    </b-col>
    <b-col
      md="1"
    />
  </div>
</template>

<script>

export default {
  components: {

  },
  asyncData ({ $auth, redirect }) {
    if (!$auth.loggedIn) {
      redirect('/')
    }
  },
  data () {
    return {
      errors: {},
      form: {
        name: '',
        slug: ''
      }
    }
  },
  methods: {
    async addJobTypeInformation () {
      try {
        await this.$axios.get('sanctum/csrf-cookie')
        await this.$axios.post('api/admin/job_types', this.form)
        await this.$router.replace({ path: '/admin/jobType' })
      } catch (error) {
        if (error.response.status === 422) {
          this.errors = error.response.data.errors
        }
      }
    }
  }
}
</script>
