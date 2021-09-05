<template>
<div>
    <PageHeader :title="title" />
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <!-- Search -->
                        <div class="col-sm-12 col-md-4">
                          <div class="dataTables_filter text-md-left m-1">
                                <label class="d-inline-flex align-items-center">
                                    Search:
                                    <b-form-input v-model="filter" type="search" placeholder="Search..." class="form-control form-control-sm ml-2"></b-form-input>
                                </label>
                            </div>
                        </div>
                        <!-- Start - End Datetime filter -->
                        <div class="col-sm-12 col-md-4">
                          <div class="dataTables_filter m-1">
                                <label class="d-flex align-items-center">
                                    <b-form-input v-model="filter" type="search" placeholder="Start-End Datetime filter..." class="form-control form-control-sm"></b-form-input>
                                </label>
                            </div>
                        </div>
                        <!-- print button -->
                        <div class="col-sm-12 col-md-4">
                            <div class="d-flex justify-content-end m-1">
                                <nuxt-link to="/" class="btn btn-success mb-2"><div class="mx-2">Print</div></nuxt-link>                     
                            </div>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive mb-0">
                        <b-table table-class="table table-centered w-100" thead-tr-class="bg-light" :items="productData" :fields="fields" responsive="sm" :per-page="perPage" :current-page="currentPage" :sort-by.sync="sortBy" :sort-desc.sync="sortDesc" :filter="filter" :filter-included-fields="filterOn" @filtered="onFiltered">
                            <template v-slot:cell(check)="data">
                                <div class="custom-control custom-checkbox text-center">
                                    <input type="checkbox" class="custom-control-input" :id="`contacusercheck${data.item.id}`" />
                                    <label class="custom-control-label" :for="`contacusercheck${data.item.id}`"></label>
                                </div>
                            </template>

                            <template v-slot:cell(identifier)="data">
                                <h5 class="m-0 d-inline-block align-middle">
                                    <a href="#" class="text-info"><u>{{ data.item.identifier }}</u></a>
                                </h5>
                            </template>
                            </b-table>
                    </div>
                        <!-- Display sessions -->
                         <div class="d-flex justify-content-between">
                             <div class="d-flex justify-content-center p-2">
                                 <div id="tickets-table_length" class="dataTables_length">
                                <label class="d-inline-flex align-items-center">
                                    Display&nbsp;
                                    <b-form-select v-model="perPage" size="sm" :options="pageOptions"></b-form-select>&nbsp;Sessions
                                </label>
                            </div>
                              </div>         
                              <div class="d-flex justify-content-center p-2">
                                   
                                <ul class="pagination pagination-rounded">
                                    <!-- pagination -->
                                    <b-pagination v-model="currentPage" :total-rows="rows" :per-page="perPage"></b-pagination>
                                </ul>
                           
                               </div>
                          </div>

                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import {
    productData
} from "./data";

/**
 * Products-list component
 */
export default {
    head() {
        return {
            title: `${this.title} `,
        };
    },
    data() {
        return {
            productData: productData,
            title: "Session History",
            items: [
            ],
            totalRows: 1,
            currentPage: 1,
            perPage: 10,
            pageOptions: [10, 25, 50, 100],
            filter: null,
            filterOn: [],
            sortBy: "age",
            sortDesc: false,
            fields: [{
                    key: "check",
                    label: ""
                },
                {
                    key: "identifier",
                    label:"Identifier",
                    sortable: true
                },
                {
                    key: "start",
                    label: "Start",
                    sortable: true
                },
                {
                    key: "end",
                    label: "End",
                    sortable: true
                },
                {
                    key: "duration",
                    label: "Duration",
                    sortable: true
                }
            ]
        };
    },
    computed: {
        /**
         * Total no. of records
         */
        rows() {
            return this.productData.length;
        }
    },
    mounted() {
        // Set the initial number of items
        this.totalRows = this.items.length;
    },
    methods: {
        /**
         * Search the table data with search input
         */
        onFiltered(filteredItems) {
            // Trigger pagination to update the number of buttons/pages due to filtering
            this.totalRows = filteredItems.length;
            this.currentPage = 1;
        }
    },
    middleware: 'router-auth',
};
</script>
