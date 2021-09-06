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
  head() {
    return {
      title: `${this.title}`,
    };
  },
  data() {
    return {
      title: `${this.title}`
    }
  },
  components:{
    JobType
  },
  methods: {
  }
}
</script>
