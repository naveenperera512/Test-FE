<template>
  <div>
    <div>
      <Profile />
    </div>
    <div>
      <Password />
    </div>
  </div>
</template>

<script>
import Profile from './update-profile'
import Password from './update-password'

export default {
  components: {
    Profile,
    Password
  },
  layout: 'auth',
  methods: {}
}
</script>
