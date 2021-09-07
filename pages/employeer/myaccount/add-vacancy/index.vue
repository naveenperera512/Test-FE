 <template>
  <div>
    <div class="row">
      <div class="col-lg-12">
        <div>
          <h4 class="header-title mb-3">
            Fill in the details
          </h4>
          <h6 class="sub-header">
            About the job
          </h6>

          <form>
            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label for="title">Title</label>
                  <span class="text-danger">*</span>
                  <input id="title" class="form-control" type="text" placeholder="Some text value...">
                </div>
              </div>
            </div>

            <div class="row">
              <b-form-group class="col-md-8" label="Select Job Category" label-for="inputState">
                <select id="inputState" class="form-control ">
                  <option>
                    Please select an option
                  </option>
                  <option v-for="(category, index) in categories.data" :key="index">
                    {{ category.name }}
                  </option>
                </select>
              </b-form-group>
              <b-form-group class="col-md-8" label="Select Job Type" label-for="inputState">
                <select id="inputState" class="form-control">
                  <option>
                    Please select an option
                  </option>
                  <option v-for="(jobtype, index) in jobtypes.data" :key="index">
                    {{ jobtype.name }}
                  </option>
                </select>
              </b-form-group>
              <b-form-group class="col-md-8" label="Select District" label-for="inputState">
                <select id="inputState" class="form-control">
                  <option>
                    Please select an option
                  </option>
                  <option v-for="(district, index) in districts.data" :key="index">
                    {{ district.name }}
                  </option>
                </select>
              </b-form-group>
              <b-form-group class="col-md-8" label="Select City" label-for="inputState">
                <select id="inputState" class="form-control">
                  <option>
                    Please select an option
                  </option>
                  <option v-for="(city, index) in cities.data" :key="index">
                    {{ city.name }}
                  </option>
                </select>
              </b-form-group>
            </div>

            <div class="row">
              <div class="col-md-8">
                <div class="form-group mt-3">
                  <label for="example-textarea">Description</label>
                  <textarea id="example-textarea" class="form-control" rows="3" placeholder="Write some note.." />
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  <label for="date" label-cols-sm="2" label-cols-lg="2" label="Date" label-for="date">Date</label>
                  <b-form-input id="date" value="2019-08-19" type="date" />
                </div>
              </div>
            </div>

            <h6 class="sub-header">
              About the employeer
            </h6>

            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label for="employeer-name">Employeer name</label>
                  <span class="text-danger">*</span>
                  <input id="employeer-name" class="form-control" type="text" placeholder="Enter name">
                </div>
              </div>
            </div>

            <h6 class="sub-header">
              Contact details
            </h6>

            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label for="billing-email-address">Email Address
                    <span class="text-danger">*</span></label>
                  <input id="billing-email-address" class="form-control" type="email" placeholder="Enter your email">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  <label for="billing-phone">Phone <span class="text-danger">*</span></label>
                  <input id="billing-phone" class="form-control" type="text" placeholder="(xx) xxx xxxx xxx">
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-8">
          <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-success ">
              <i class="mdi mdi-truck-fast mr-1" /> Post vacancy
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

/**
 * Checkout component
 */
export default {
  components: {},
  data () {
    return {
      categories: {},
      jobtypes: {},
      districts: {},
      cities: {}
    }
  },
  created () {
    this.getDistrictList()
    this.getCategorytList()
    this.getJobTypeList()
    this.getCityList()
  },

  methods: {

    getCategorytList () {
      try {
        this.$axios.get('api/categories')
          .then((response) => {
            this.categories = (response.data)
          })
      } catch (error) {
        // eslint-disable-next-line no-console
        console.log(error)
      }
    },
    getJobTypeList () {
      try {
        this.$axios.get('api/jobTypes')
          .then((response) => {
            this.jobtypes = (response.data)
          })
      } catch (error) {
        // eslint-disable-next-line no-console
        console.log(error)
      }
    },
    getDistrictList () {
      try {
        this.$axios.get('api/districts')
          .then((response) => {
            this.districts = (response.data)
          })
      } catch (error) {
        // eslint-disable-next-line no-console
        console.log(error)
      }
    },
    getCityList () {
      try {
        this.$axios.get('api/cities')
          .then((response) => {
            this.cities = (response.data)
          })
      } catch (error) {
        // eslint-disable-next-line no-console
        console.log(error)
      }
    }
  }
}
</script>
