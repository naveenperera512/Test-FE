<template>
<div>
    <PageHeader :title="title" :items="items" />
                     
                        <!-- Invite user Button -->
                        <div class="col-sm-12 col-md-12">
                            <div id="tickets-table_filter" class="dataTables_filter text-md-right">
                                <nuxt-link to="/" class="btn btn-success mb-2">
                                <div class="mx-2">Create
                                </div>
                                </nuxt-link>
                               </div>
                        </div>

                    <!-- Table -->
                    <div class="table-responsive mb-0">
                        <b-table 
                        table-class="table table-centered w-100" 
                        thead-tr-class="bg-light" 
                        :items="TeamData" 
                        :fields="fields" 
                        responsive="sm" 
                        :per-page="perPage" 
                        :current-page="currentPage" 
                        :sort-by.sync="sortBy" 
                        :sort-desc.sync="sortDesc" 
                        :filter="filter" 
                        :filter-included-fields="filterOn" 
                        @filtered="onFiltered">


                            <template v-slot:cell(actions)="data">
                                <span class="badge badge-soft-success" 
                                :class="{'badge-soft-warning': data.item.actions === 'block',
                                'badge-soft-light': data.item.actions === ''}">
                                {{ data.item.actions }}</span>
                            </template>

                             <template
                                    v-slot:cell(user)>
                                    <div>
                                        <b-avatar-group size="35px">
                                        <b-avatar
                                            src="~/assets/images/users/avatar-1.jpg"
                                            variant="info" />
                                        <b-avatar
                                            text="JA"
                                            variant="info" />
                                        <b-avatar
                                            src="~/assets/images/avatars/2.png" />
                                        <b-avatar
                                            src="~/assets/images/avatars/5.png" />
                                        <b-avatar
                                            src="~/assets/images/avatars/11.png" />
                                        <b-avatar
                                            src="~/assets/images/avatars/6.png" />
                                        </b-avatar-group>
                                    </div>
                            </template>
                        </b-table>
                    </div>
                    <!-- Display sessions -->
                         <div class="d-flex justify-content-between">
                             <div class="p-2">
                                 <div id="tickets-table_length" class="dataTables_length">
                                <label class="d-inline-flex align-items-center">
                                    Display&nbsp;
                                    <b-form-select v-model="perPage" size="sm" :options="pageOptions"></b-form-select>&nbsp;Teams
                                </label>
                            </div>
                              </div>         
                              <div class="p-2">
                                   
                                <ul class="pagination pagination-rounded">
                                    <!-- pagination -->
                                    <b-pagination v-model="currentPage" :total-rows="rows" :per-page="perPage"></b-pagination>
                                </ul>
                           
                               </div>
                          </div>
</div>
</template>

<script>
import {
    TeamData
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
            TeamData: TeamData,
            title: "Teams",
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
            fields: [
                {
                    key: "name",
                    label: "Name",
                    sortable: true
                },
 
                 {
                    key: "user",
                    label: "Users",
                    sortable: true
                },
                {
                    key: "actions",
                    label: "Actions",
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
            return this.TeamData.length;
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
