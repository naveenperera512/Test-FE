<template>
  <div>
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-12">
            <div>
              <h5 class="header-title">
                Update Profile
              </h5>

              <b-form
                @submit.prevent="updateProfileInformation"
              >
                <!-- Email -->

                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Email :</label>
                  <div class="col-sm-4">
                    <label for=""><h5>{{ this.$auth.user.email }}</h5></label>
                  </div>
                </div>

                <!-- Name -->

                <div class="row">
                  <div class="col-md-8">
                    <label> Name </label>
                    <b-form-group label-for="input-name">
                      <b-form-input
                        id="input-name"
                        v-model="form.name"
                        :state="errors && errors.name ? false : null"
                        placeholder="Enter name"
                        type="text"
                      />
                      <b-form-invalid-feedback
                        v-if="errors && errors.name"
                        id="input-name-feedback"
                      >
                        {{ errors.name[0] }}
                      </b-form-invalid-feedback>
                    </b-form-group>
                  </div>
                </div>

                <!-- button-->

                <div class="row">
                  <div class="col-sm-12 col-md-8">
                    <div
                      class="d-flex justify-content-end"
                    >
                      <b-button
                        class=" ml-2 bg-success btn-sm"
                        type="submit"
                      >
                        Update Profile
                      </b-button>
                    </div>
                  </div>
                </div>
              </b-form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {

  // eslint-disable-next-line no-dupe-keys
  layout: 'auth',
  asyncData ({ $auth, redirect }) {
    if (!$auth.loggedIn) {
      redirect('/')
    }
  },
  data () {
    return {
      errors: {},
      form: {
        name: this.$auth.user.name,
        email: this.$auth.user.email
      }
    }
  },
  methods: {
    async updateProfileInformation () {
      try {
        await this.$axios.get('sanctum/csrf-cookie')
        await this.$axios.put('user/profile-information', this.form)

        await this.$router.replace({ path: '/employeer' })
      } catch (error) {
        if (error.response.status === 422) {
          this.errors = error.response.data.errors
        }
      }
      await this.$auth.fetchUser()
    }

  }
}
</script>
