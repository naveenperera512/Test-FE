<template v-if="$auth.loggedIn && $auth.user.is_admin === 0 ">
  <div>
        <div class="row">
          <div class="col-lg-12">
        <div v-for="(product, index) in product_list.data" :key="index">
          <div class="card mt-2">
            <div class="card-body pb-1">
              <div class="row">
                <div class="col-md-7">
                  <div class="ml-2">
                    <h4 class="bx-bold">
                      {{ product.title }}
                    </h4>
                  </div>
                  <div class="ml-3">
                    <p>{{ product.employee_name }}</p>
                  </div>
                </div>
                <div class="col-md-2 mt-3">
                  <p>{{ product.district.name }} , {{ product.cities.name }}</p>
                </div>
                <div class="col-md-3 ">
                  <div class="d-flex justify-content-end">
                    {{ product.created_at }}
                  </div>
                  <div class="d-flex justify-content-end mr-3 mt-2">
                    <div class="alert alert-primary" role="alert">
                      {{ product.jobs.name }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <b-col
        md="2"
      />
    </div>
    </div>
    </div>
</template>
<script>
export default {

  components: {},
  data () {
    return {
      product_list: {},
    }
  },
  created () {
    this.getProductList()
  },

  methods: {
    getProductList () {
      try {
        this.$axios.get('api/vacancies')
          .then((response) => {
            this.product_list = (response.data)
            // console.log(this.product_list)
          })
      } catch (error) {
        // eslint-disable-next-line no-console
        console.log(error)
      }
    },
  }
}
</script>
