<template>
  <div>
    <PageHeader :title="title" />
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div  class="card-body">
            <Vacancyp  />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>



<script>
import Vacancyp from '@/components/admin/Vacancyp'

export default {

  data() {
    return {
      title: `Pending Vacancy List`
    }
  },
  components:{
    Vacancyp
  },
  methods: {
  }
}
</script>
