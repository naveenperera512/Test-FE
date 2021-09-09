<template>
  <!-- Login form -->
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card">
            <div class="card-body p-4">
                <div class="text-center w-75 m-auto">
                    <div class="auth-logo">
                        <div class="logo logo-dark text-center">
                           <span class="logo-lg">
                               <img src="~/assets/images/auth-logo.png" width="100">
                           </span>
                            <!-- <span class="logo-lg mt-2">
                               <img src="~/assets/images/logo-white.png" width="200">
                            </span> -->
                        </div>
                    </div>
                    <p class="text-muted mb-4 mt-3">Enter your email address and password to access admin panel.</p>
                </div>
                      <!-- form -->
                      <b-form @submit.prevent="login">

                              <!-- email -->
                              <b-form-group label-for="input-email">
                                  <template v-slot:label>
                                    Email
                                  </template>
                                  <b-form-input
                                    id="input-email"
                                    v-model="form.email"
                                    type="text"
                                    :state="this.errors && this.errors.email ? false : null"
                                    placeholder="Enter Email" />
                                  <b-form-invalid-feedback
                                    v-if="errors && errors.email"
                                    id="input-email-feedback">
                                    {{ errors.email[0] }}
                                  </b-form-invalid-feedback>
                              </b-form-group>

                              <!-- password -->
                              <b-form-group label-for="input-password">
                                  <template v-slot:label>
                                    Password
                                  </template>
                                  <b-form-input
                                    id="input-password"
                                    v-model="form.password"
                                    type="password"
                                    :state="this.errors && this.errors.password ? false : null"
                                    placeholder="Enter password" />
                                  <b-form-invalid-feedback
                                    v-if="errors && errors.password"
                                    id="input-password-feedback">
                                    {{ errors.password[0] }}
                                  </b-form-invalid-feedback>
                              </b-form-group>

                              <!-- checkbox  -->
                              <div class="form-group mb-3">
                                  <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="checkbox-login" checked />
                                      <label class="custom-control-label" for="checkbox-login">Remember me</label>
                                  </div>
                              </div>

                              <!-- login button -->
                              <div class="form-group mb-0 text-center">
                                  <button class="btn btn-primary btn-block" type="submit">Log In</button>
                              </div>
                      </b-form>
                    </div>
            </div>

          <!-- forgot password & sign up  -->
         <div class="row mt-3">
            <div class="col-12 text-center">
                <p>
                    <nuxt-link to="/auth/forgot-password" class="text-muted ml-1">Forgot your password?</nuxt-link>
                </p>
                <p class="text-muted">
                    Don't have an account?
                    <nuxt-link to="/auth/register" class="text-primary font-weight-medium ml-1">Sign Up</nuxt-link>
                </p>
            </div>
        </div>
    </div>
  </div>
</template>


<script>
export default {
  asyncData({$auth, redirect}){
    if ($auth.loggedIn) {
      redirect('/')
    }
  },
  data(){
    return{
      errors:{},
      form: {
        email: '',
        password: '',
      }
    }
  },
  methods:{
    async login(){
      try{
        await this.$auth.loginWith('laravelSanctum' , {
          data: this.form
        })
        await this.$router.replace({path:'/'})
      }catch (error) {
        if(error.response.status === 422) {
          this.errors = error.response.data.errors;
        }
      }
    }
  },
  layout: "auth",
}
</script>
