<template>
  <div>
    <PageHeader :title="title" />
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div  class="card-body">
            <UserManagement />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>



<script>
import UserManagement from '@/components/admin/User'

export default {

  data() {
    return {
      title: `User Manage List`
    }
  },
  components:{
    UserManagement
  },
  methods: {
  }
}
</script>
