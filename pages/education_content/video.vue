<template>
<div>
    <PageHeader :title="title" />
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">

                        <!-- Session Identifier & start button -->
                        <div class="col-sm-12 col-md-12">
                            <div class="text-md-right ">
                                <label class="d-flex justify-content-end">
                                    <div class="card mx-2">
                                        <div class="mx-2 mt-1">
                                            <span class="mr-1">
                                               00:50:42 Paatient 1
                                            </span>
                                        <span>
                                <nuxt-link to="/" class="btn btn-success mb-2"><div class="mx-2">Stop</div></nuxt-link>                     
                            </span>
                                        </div>
                                    </div>
                                </label> </div>
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
