<template>
  <div>
    <div class="row">
      <div class="col-12">
        <div class="row mb-2">
          <div class="col-sm-12">
            <div class="float-sm-right">
              <nuxt-link class="btn btn-info mb-2" to="/admin/add-jobtype/add">
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
            :items="categories.data"
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
            <template #cell(action)>
              <ul class="list-inline table-action m-0">
                <li class="list-inline-item">
                  <NuxtLink to="/admin/add-jobtype/update">
                    Edit
                  </NuxtLink>
                </li>
                <li class="list-inline-item">
                  <a href="javascript:void(0);" class="action-icon">
                    <i class="mdi mdi-square-edit-outline"></i></a>
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
              <LaravelVuePagination :data="categories" @pagination-change-page="getCategoryList" class="pagination pagination-rounded">
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
      categories: {},
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
    this.getCategoryList()
  },
  methods: {
    getCategoryList (page =1) {
      this.$axios.get('api/admin/categories?page=' + page)
        .then((response) => {
          this.categories = (response.data)
          console.log(this.categories)
        })
        .catch((error) => {
          // eslint-disable-next-line no-console
          console.log(error)
        })
    }
  }
}
</script>
