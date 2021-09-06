<template>
  <div>
    <div class="row">
      <div class="col-12">
        <div class="row mb-2">
          <div class="col-sm-12">
            <div class="float-sm-right">
              <nuxt-link class="btn btn-info mb-2" to="/admin/jobType/add">
                <i class="mdi mdi-plus-circle mr-1" /> Add Job Types
              </nuxt-link>
            </div>
          </div><!-- end col-->
        </div>
        <div class="row mb-2">
          <!-- Search -->
          <div class="col-sm-12 col-md-6">
            <div id="tickets-table_filter" class="dataTables_filter ">
              <label class="d-inline-flex align-items-center">
                Search:
                <b-form-input
                  v-model="filter"
                  class="form-control form-control-sm ml-2"
                  placeholder="Search..."
                  type="search"
                />
              </label>
            </div>
          </div>
          <!-- End search -->
        </div>
        <!-- Table -->
        <div class="table-responsive mb-0">
          <b-table
            :current-page="currentPage"
            :fields="fields"
            :filter="filter"
            :filter-included-fields="filterOn"
            :items="jobytpes.data"
            :per-page="perPage"
            :sort-by.sync="sortBy"
            :sort-desc.sync="sortDesc"
            class="card"
            responsive="sm"
            table-class="table table-centered w-100"
            thead-tr-class="bg-light"
            @filtered="onFiltered"
          >
            <template #cell(id)="data">
              <p class="m-0 d-inline-block align-middle">
                {{ data.item.id }}
              </p>
            </template>
            <template #cell(name)="data">
              <p class="m-0 d-inline-block align-middle">
                {{ data.item.name }}
              </p>
            </template>
            <template #cell(action)="data">
              <ul class="list-inline table-action m-0">
                <li class="list-inline-item">
                  <nuxt-link :to="'/admin/jobtype/' +  data.item.id ">
                    <a href="javascript:void(0);" class="action-icon">
                      <i class="mdi mdi-square-edit-outline"></i></a>
                  </nuxt-link>
                </li>
                <li class="list-inline-item">
                  <a href="javascript:void(0);" class="action-icon">
                    <i class="mdi mdi-delete"></i></a>
                </li>
              </ul>
            </template>
          </b-table>
        </div>
        <div class="row">
          <div class="col">

            <div  class="d-flex justify-content-end">
            <LaravelVuePagination :data="jobytpes" @pagination-change-page="getProductList" class="pagination pagination-rounded">
              <span slot="prev-nav">&lt; Previous</span>
              <span slot="next-nav">Next &gt;</span>
            </LaravelVuePagination>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import LaravelVuePagination from 'laravel-vue-pagination'
export default {

  components: {
    LaravelVuePagination
  },
  data () {
    return {
      jobytpes: {},
      title: 'Products List',
      items: [],
      pageOptions: [3, 5, 10, 100],
      filter: null,
      filterOn: [],
      sortBy: 'age',
      sortDesc: false,
      fields: [{
        key: 'id',
        lable: 'ID'
      },
        {
          key: 'name',
          label: 'Name'
        },
        'action'
      ]
    }
  },
  created () {
    this.getProductList()
  },
  methods: {
    getProductList (page =1) {
      this.$axios.get('api/admin/job_types?page=' + page)
        .then((response) => {
          this.jobytpes = (response.data)
          this.beta = (response.data).meta
          console.log(this.jobytpes)
        })
        .catch((error) => {
          // eslint-disable-next-line no-console
          console.log(error)
        })
    }
  }
}
</script>
