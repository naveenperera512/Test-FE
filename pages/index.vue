<template>
  <div>
    <template v-if="!$auth.loggedIn">
      <div>
        <User />
      </div>
    </template>
    <template
      v-if="$auth.loggedIn && $auth.user.is_admin === 1 "
    >
      <div>
        <Admin />
      </div>
    </template>
    <template
      v-if="$auth.loggedIn && $auth.user.is_admin === 0 "
    >
      <div>
        <Employee />
      </div>
    </template>
  </div>
</template>

<script>
import Admin from './admin'
import User from './user'
import Employee from './employeer'

export default {
  components: {
    User,
    Employee,
    Admin
  },
  layout: 'default',
  methods: {}
}
</script>
