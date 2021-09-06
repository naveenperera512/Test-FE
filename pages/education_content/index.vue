<template>
<div>
    <PageHeader :title="title" />
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">

                        <!-- Session Identifier -->
                        <div class="col-sm-12 col-md-11">
                                <div class="d-flex justify-content-end">
                          <div class="dataTables_filter m-1 col-sm-12 col-md-4 ">
                                <label class="d-flex justify-content-right">
                                    <b-form-input placeholder="Session Identifier (will be auto filled)" class="form-control form-control-sm"></b-form-input>
                                </label>
                          </div>
                        </div>
                        </div>
                        <!-- start button -->
                        <div class="col-sm-12 col-md-1">
                            <div class="text-md-right ">
                                <nuxt-link to="/" class="btn btn-success mb-2"><div class="mx-2">Start</div></nuxt-link>                     
                            </div>
                        </div>
                    </div>
                <div class="card">
                 <img src="~/assets/images/edu.png" width="1500">
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>

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
            title: "Education Content",
        }
    },

    middleware: 'router-auth',
};
</script>
