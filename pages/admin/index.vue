<template>
  <div>
    <PageHeader :title="title" />
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div  class="card-body">
            <Category  />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>



<script>
import Category from '@/components/admin/Category'

export default {

  data() {
    return {
      title: `Category List `
    }
  },
  components:{
    Category
  },
  methods: {
  }
}
</script>
