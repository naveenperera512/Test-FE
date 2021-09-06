<template>
  <div>
    <div class="row card mt-3">
      <div class="col-12 card-body">
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
            :items="users.data"
            :per-page="perPage"
            :sort-by.sync="sortBy"
            :sort-desc.sync="sortDesc"
            class="card"
            responsive="sm"
            table-class="table table-centered w-100"
            thead-tr-class="bg-light"
            @filtered="onFiltered"
          >
            <template #cell(name)="data">
              <p class="m-0 d-inline-block align-middle">
                {{ data.item.name }}
              </p>
            </template>
            <template #cell(email)="data">
              <p class="m-0 d-inline-block align-middle">
                {{ data.item.email }}
              </p>
            </template>
            <template #cell(action)="data">
              <ul class="list-inline table-action m-0">
                <li class="list-inline-item mr-3">
                  <nuxt-link :to="'/admin/' +  data.item.id ">
                    <a href="javascript:void(0);" class="action-icon">
                      <i class="mdi mdi-square-edit-outline"></i></a>
                  </nuxt-link>
                </li>
              </ul>
            </template>
          </b-table>
        </div>
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <div id="tickets-table_length" class="dataTables_length">
              <label class="d-inline-flex align-items-center">
                Display&nbsp;
                <b-form-select v-model="perPage" size="sm" :options="pageOptions"></b-form-select>&nbsp;customers
              </label>
            </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="dataTables_paginate paging_simple_numbers float-right">
              <ul class="pagination pagination-rounded">
                <!-- pagination -->
                <b-pagination v-model="currentPage" :total-rows="paginats.total" :per-page="perPage"></b-pagination>
              </ul>
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
      paginats: {},
      users: {},
      title: 'Products List',
      totalRows: 1,
      currentPage: 1,
      perPage: 10,
      items: [],
      pageOptions: [10, 20, 50, 100],
      filter: null,
      filterOn: [],
      sortBy: 'age',
      sortDesc: false,
      fields: [{
        key: 'name',
        label: 'Name'
      },
        {
          key: 'email',
          label: 'Email'
        },
        'action'
      ]
    }
  },
  computed: {
    /**
     * Total no. of records
     */
    rows() {
      return this.users.length;
    }
  },
  created () {
    this.getAdminList()
  },
  methods: {
    getAdminList (page =1) {
      this.$axios.get('api/admin/users?page=' + page)
        .then((response) => {
          this.users = (response.data)
          this.paginats = (response.data).meta
        })
        .catch((error) => {
          // eslint-disable-next-line no-console
          console.log(error)
        })
    },
  }
}
</script>
