<template>
  <div class="container">
    <div class="row">
      <div>
        <div class="row mb-3">
          <div>
            <div class="p-2 mb-lg-0 ml-5">
              <div class="row">
                <div>
                  <div class="row mb-3">
                    <div>
                      <div class="p-2 mb-lg-0 ml-5">
                        <div>
                          <nuxt-link class="btn bg-info ml-2" to="/admin">
                            Back
                          </nuxt-link>
                        </div>
                        <table class="table table-borderless table-sm mb-0">
                          <tbody>
                          <tr>
                            <th scope="row">
                              Employeer:
                            </th>
                            <td>{{ categories.id }}</td>
                          </tr>
                          <th scope="row">
                            Job type:
                          </th>
                          <td>{{ categories.name }}</td>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {

  components: {},

  data() {
    return {
      categories: [],
    }
  },

  created() {
    try {
      this.$axios.get(`api/admin/jobTypes/${this.$route.params.id}`)
        .then((response) => {
          this.categories = (response.data).data
          console.log(this.categories)
        })
    } catch (error) {
      // eslint-disable-next-line no-console
      console.log(error)
    }
  }
}
</script>
