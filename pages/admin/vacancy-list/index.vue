<template>
  <div>
    <PageHeader :title="title" />
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div  class="card-body">
            <Vacancya  />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>



<script>
import Vacancya from '@/components/admin/Vacancya'

export default {

  data() {
    return {
      title: `Job Type List`
    }
  },
  components:{
    Vacancya
  },
  methods: {
  }
}
</script>
