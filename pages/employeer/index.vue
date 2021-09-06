<template>
  <div>
    <Vacancye />
  </div>
</template>

<script>
import Vacancye from '@/components/employeer/Vacancye'

export default {
  data() {
    return {
      vacancies: {}
    }
  },
  components:{
    Vacancye
  },
  methods: {
  }
}
</script>
