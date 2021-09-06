<template>
  <div>
    <PageHeader :title="title" />
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div  class="card-body">
            <AdminManagement />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>



<script>
import AdminManagement from '@/components/admin/Admin'

export default {

  data() {
    return {
      title: `Admin Manage List`
    }
  },
  components:{
    AdminManagement
  },
  methods: {
  }
}
</script>

