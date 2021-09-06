<template>
  <div>
    <Vacancy />
  </div>
</template>

<script>
import Vacancy from '@/components/user/Vacancy'

export default {
  data() {
    return {
      vacancies: {}
    }
  },
  components:{
    Vacancy
  },
  methods: {
  }
}
</script>
