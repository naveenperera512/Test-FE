<template>
  <div class="container card mt-3">
    <div class="row container card-body ">
      <div class="col-lg-12">
        <div>
          <h4 class="header-title mb-3">
            <NuxtLink to="/employeer/myaccount">
              <<- Back
            </NuxtLink>
            <span class="mr-3">
              Fill in the details
            </span>
          </h4>
          <h6 class="sub-header">
            About the job
          </h6>

          <form>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="title">Title</label>
                  <span class="text-danger">*</span>
                  <input id="title" class="form-control" placeholder="Some text value..." type="text">
                </div>
              </div>
            </div>

            <div class="row">
              <b-form-group class="col-md-12" label="Select Job Category" label-for="inputState">
                <select class="form-control ">
                  <option>
                    Please select an option
                  </option>
                  <option v-for="(category, index) in categories.data" :key="index">
                    {{ category.name }}
                  </option>
                </select>
              </b-form-group>
              <b-form-group class="col-md-12" label="Select Job Type" label-for="inputState">
                <select class="form-control">
                  <option>
                    Please select an option
                  </option>
                  <option v-for="(jobtype, index) in jobtypes.data" :key="index">
                    {{ jobtype.name }}
                  </option>
                </select>
              </b-form-group>
              <b-form-group class="col-md-12" label="Select District" label-for="inputState">
                <select class="form-control">
                  <option>
                    Please select an option
                  </option>
                  <option v-for="(district, index) in districts.data" :key="index">
                    {{ district.name }}
                  </option>
                </select>
              </b-form-group>
              <b-form-group class="col-md-12" label="Select City" label-for="inputState">
                <select class="form-control">
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
              <div class="col-md-12">
                <div class="form-group mt-3">
                     <label for="example-textarea">Description</label>
                     <p class="text-muted font-13 m-b-30">Snow is a clean, flat toolbar theme.</p>
                     <quill-editor style="min-height: 250px;" :options="editorOption" />
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group mt-3">
                  <label for="example-textarea">Image Upload</label>
                  <p class="text-muted font-13 m-b-30">DropzoneJS is an open source library that provides drag’n’drop
                    file
                    uploads with image previews.</p>
                  <!-- file upload -->
                  <vue-dropzone id="dropzone" ref="myVueDropzone" :options="dropzoneOptions" :use-custom-slot="true">
                    <div class="dz-message needsclick">
                      <i class="h1 text-muted ri-upload-cloud-2-line"></i>
                      <h3>Drop files here or click to upload.</h3>
                      <span class="text-muted font-13">(This is just a demo dropzone. Selected files are
                                <strong>not</strong> actually uploaded.)</span>
                    </div>
                  </vue-dropzone>

                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label  label="Date" label-cols-lg="2" label-cols-sm="2" label-for="date">Date</label>
                  <b-form-input id="date" type="date" value="2019-08-19"/>
                </div>
              </div>
            </div>

            <h6 class="sub-header">
              About the employeer
            </h6>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="employeer-name">Employeer name</label>
                  <span class="text-danger">*</span>
                  <input id="employeer-name" class="form-control" placeholder="Enter name" type="text">
                </div>
              </div>
            </div>

            <h6 class="sub-header">
              Contact details
            </h6>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="billing-email-address">Email Address
                    <span class="text-danger">*</span></label>
                  <input id="billing-email-address" class="form-control" placeholder="Enter your email" type="email">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="billing-phone">Phone <span class="text-danger">*</span></label>
                  <input id="billing-phone" class="form-control" placeholder="(xx) xxx xxxx xxx" type="text">
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-12">
          <div class="d-flex justify-content-end">
            <button class="btn btn-success " type="button">
              <i class="mdi mdi-truck-fast mr-1"/> Post vacancy
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import vue2Dropzone from 'vue2-dropzone'

/**
 * Checkout component
 */
export default {
  components: {
    vueDropzone: vue2Dropzone
  },
  data() {
    return {
      categories: {},
      jobtypes: {},
      districts: {},
      cities: {},
      dropzoneOptions: {
        url: 'https://httpbin.org/post',
        thumbnailWidth: 150,
        maxFilesize: 0.5,
        headers: {
          'My-Awesome-Header': 'header value'
        },
        previewTemplate: this.template()
      },
      editorOption: {
                // Some Quill options...
                theme: "snow",
                modules: {
                    toolbar: [
                        [{
                                font: [],
                            },
                            {
                                size: [],
                            },
                        ],
                        ["bold", "italic", "underline"],
                        [{
                                color: [],
                            },
                            {
                                background: [],
                            },
                        ],,
                        [{
                                header: [false, 1, 2, 3, 4, 5, 6],
                            },
                            "blockquote",
                            "code-block",
                        ],
                        [{
                                list: "ordered",
                            },
                            {
                                list: "bullet",
                            },
                            {
                                indent: "-1",
                            },
                            {
                                indent: "+1",
                            },
                        ],
                        [
                            {
                                align: [],
                            },
                        ],
                    ],
                },
            }
    }
  },

  created() {
    this.getDistrictList()
    this.getCategorytList()
    this.getJobTypeList()
    this.getCityList()
  },

  methods: {

    getCategorytList() {
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
    getJobTypeList() {
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
    getDistrictList() {
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
    getCityList() {
      try {
        this.$axios.get('api/cities')
          .then((response) => {
            this.cities = (response.data)
          })
      } catch (error) {
        // eslint-disable-next-line no-console
        console.log(error)
      }
    },

    template: function () {
      return ` <div class="dropzone-previews mt-3">
            <div class="card mt-1 mb-0 shadow-none border">
                <div class="p-2">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                        </div>
                        <div class="col pl-0">
                            <a href="javascript:void(0);" class="text-muted font-weight-bold" data-dz-name></a>
                            <p class="mb-0" data-dz-size></p>
                        </div>
                        <div class="col-auto">
                            <!-- Button -->
      <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
      <i class="fe-x"></i>
      </a>
      </div>
      </div>
      </div>
      </div>
      </div>
      `
      },
  }
}

</script>
