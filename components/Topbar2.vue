<script>
/**
 * Footer Component
 */
export default {}
</script>

<!--  User Top Bar-->
<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div v-if="!$auth.loggedIn" class="container-fluid">
      <button
        aria-controls="navbarScroll"
        aria-expanded="false"
        aria-label="Toggle navigation"
        class="navbar-toggler"
        data-bs-target="#navbarScroll"
        data-bs-toggle="collapse"
        type="button"
      >
        <span class="navbar-toggler-icon text-white" />
      </button>
      <nuxt-link to="/user" class="navbar-brand">
        <h1 class="text-white">~ SL JOBS ~</h1>
      </nuxt-link>
      <div class="d-flex justify-content-end">
        <nuxt-link :to="{ path: '/auth/login'}"
                   class="p-2 mr-2 text-white">
          <h5 class="collapse navbar-collapse">
            <img class="mr-1 mt-n1" height="30" width="30" src="~/assets/images/user.png">
            <span class="text-white">Login</span>
          </h5>
        </nuxt-link>

        <div class="p-2">
          <div id="navbarScroll" class="collapse navbar-collapse">
            <nuxt-link :to="{ path: '/auth/login'}">
              <button class="btn btn-warning" type="button">
                POST YOUR AD
              </button>
            </nuxt-link>
          </div>
        </div>
      </div>
    </div>
    <!--    employee-->
    <div v-if="$auth.loggedIn && $auth.user.is_admin === 0 " class="container-fluid">
      <button
        aria-controls="navbarScroll"
        aria-expanded="false"
        aria-label="Toggle navigation"
        class="navbar-toggler"
        data-bs-target="#navbarScroll"
        data-bs-toggle="collapse"
        type="button"
      >
        <span class="navbar-toggler-icon text-white" />
      </button>
      <nuxt-link to="/employeer" class="navbar-brand">
        <h1 class="text-white">~ SL JOBS ~</h1>
      </nuxt-link>
      <div class="d-flex justify-content-end">
        <nuxt-link
          :to="{ path: '/employeer/myaccount'}"
          class="p-2  mr-3 text-white"
        >
          <h5 class="collapse navbar-collapse">
            <img class="mr-1 mt-n1" height="30" width="30" src="~/assets/images/user.png">
            <span class="text-white">My Account</span>
          </h5>
        </nuxt-link>

        <div class="p-2">
          <div class="collapse navbar-collapse">
            <nuxt-link :to="{ path: '/employeer/myaccount/add-vacancy'}">
              <button class="btn btn-warning" type="button">
                POST YOUR AD
              </button>
            </nuxt-link>
          </div>
        </div>
      </div>
    </div>
    <div v-if="$auth.loggedIn && $auth.user.is_admin === 1 " class="container-fluid">
      <button
        aria-controls="navbarScroll"
        aria-expanded="false"
        aria-label="Toggle navigation"
        class="navbar-toggler"
        data-bs-target="#navbarScroll"
        data-bs-toggle="collapse"
        type="button"
      >
        <span class="navbar-toggler-icon text-white" />
      </button>
      <nuxt-link to="/admin" class="navbar-brand text-white bx-bold">
        <h2>JOBS LK Admin</h2>
      </nuxt-link>
      <div class="d-flex justify-content-end">
      </div>
    </div>
  </nav>
</template>

