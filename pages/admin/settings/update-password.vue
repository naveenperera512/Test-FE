<template>
  <div>
    <div class="row">
      <div class="col-lg-12 mt-5">
        <div class="row">
          <div class="col-lg-12">
            <!-- Current password  -->

            <b-form
              @submit.prevent="updatePassword"
            >
              <div class="row">
                <div class="col-md-8">
                  <label> Current Password </label>
                  <b-form-group label-for="current_password">
                    <b-form-input
                      id="password"
                      v-model="form.current_password"
                      :state="errors && errors.current_password ? false : null"
                      placeholder="Enter current password"
                      type="password"
                    />
                    <b-form-invalid-feedback
                      v-if="errors && errors.current_password"
                      id="password-feedback"
                    >
                      {{ errors.current_password[0] }}
                    </b-form-invalid-feedback>
                  </b-form-group>
                </div>
              </div>

              <!-- new password  -->

              <div class="row">
                <div class="col-md-8">
                  <label> New Password </label>
                  <b-form-group label-for="password">
                    <b-form-input
                      id="password"
                      v-model="form.password"
                      :state="errors && errors.password ? false : null"
                      placeholder="Enter new password"
                      type="password"
                    />
                    <b-form-invalid-feedback
                      v-if="errors && errors.password"
                      id="password-feedback"
                    >
                      {{ errors.password[0] }}
                    </b-form-invalid-feedback>
                  </b-form-group>
                </div>
              </div>

              <!-- Comfirm password  -->

              <div class="row">
                <div class="col-md-8">
                  <label> Comfirmed Password </label>
                  <b-form-group label-for="input-password">
                    <b-form-input
                      id="password_confirmation"
                      v-model="form.password_confirmation"
                      :state="errors && errors.password_confirmation ? false : null"
                      placeholder="Enter confirm password"
                      type="password"
                    />
                    <b-form-invalid-feedback
                      v-if="errors && errors.password_confirmation"
                      id="password_confirmation-feedback"
                    >
                      {{ errors.password_confirmation[0] }}
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
                      Update Password
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
</template>

<script>
/**
 * Checkout component
 */
export default {
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
        current_password: '',
        password: '',
        password_confirmation: ''
      }
    }
  },
  methods: {

    async updatePassword () {
      try {
        await this.$axios.get('sanctum/csrf-cookie')
        await this.$axios.put('user/password', this.form)

        await this.$router.replace({ path: '/admin' })
      } catch (error) {
        if (error.response.status === 422) {
          this.errors = error.response.data.errors
        }
        // eslint-disable-next-line no-console
        console.log(this.errors)
      }
    }
  }
}
</script>
