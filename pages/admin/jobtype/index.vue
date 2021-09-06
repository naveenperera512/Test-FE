<template>
  <div>
    <PageHeader :title="title" />
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div  class="card-body">
            <JobType  />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>



<script>
import JobType from '@/components/admin/JobType'

export default {

  data() {
    return {
      title: `Job Type List`
    }
  },
  components:{
    JobType
  },
  methods: {
  }
}
</script>
