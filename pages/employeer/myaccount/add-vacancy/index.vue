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

          <b-form @submit.prevent="vacancies">

            <!-- title-->
            <b-form-group label-for="title">
              <template #label>
                Title
              <span class="text-danger">*</span>
              </template>
              <b-form-input
                id="title"
                v-model="form.title"
                type="text"
                :state="errors && errors.title ? false : null"
                placeholder="Some text value..."
              />
              <b-form-invalid-feedback
                v-if="errors && errors.title"
                id="title-feedback"
              >
                {{ errors.title[0] }}
              </b-form-invalid-feedback>
            </b-form-group>

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
              <b-form-group class="col-md-6" label="Select District" label-for="inputState">
                <select class="form-control">
                  <option>
                    Please select an option
                  </option>
                  <option v-for="(district, index) in districts.data" :key="index">
                    {{ district.name }}
                  </option>
                </select>
              </b-form-group>
              <b-form-group class="col-md-6" label="Select City" label-for="inputState">
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

            
          <h6 class="sub-header">
            Date of expiry
          </h6>
            
            <!-- Date-->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label  label="Date" label-cols-lg="2" label-cols-sm="2" label-for="date">Date <span class="text-danger">*</span></label>
                  <b-form-input id="date" type="date" value="2019-08-19"/>
                </div>
              </div>
            </div>

            
            <!-- description -->
            <div class="row">
              <div class="col-md-12">
                <div class="form-group mt-3">
                     <label for="example-textarea">Description</label>
                     <p class="text-muted font-13 m-b-30">Snow is a clean, flat toolbar theme.</p>
                     <quill-editor style="min-height: 250px;" :options="editorOption" />
                </div>
              </div>
            </div>
            
            <!-- file upload -->
            <div class="row">
              <div class="col-md-12">
                <div class="form-group mt-3">
                  <label for="example-textarea">Image Upload</label>
                  <p class="text-muted font-13 m-b-30">DropzoneJS is an open source library that provides drag’n’drop
                    file
                    uploads with image previews.</p>
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

            
          <h6 class="sub-header">
            Employee details
          </h6>

            <div class="row">

            <!-- employee name-->
            <b-form-group class="col-md-6" label-for="input-employee_name">
              <template #label>
                Employeer name
                  <span class="text-danger">*</span>
              </template>
              <b-form-input
                id="input-employee_name"
                v-model="form.employee_name"
                type="text"
                :state="errors && errors.employee_name ? false : null"
                placeholder="Enter Name"
              />
              <b-form-invalid-feedback
                v-if="errors && errors.employee_name"
                id="input-employee_name-feedback"
              >
                {{ errors.employee_name[0] }}
              </b-form-invalid-feedback>
            </b-form-group>
            </div>

            <h6 class="sub-header">
              Contact details
            </h6>

            <div class="row">

            <!-- email address-->
            <b-form-group class="col-md-6" label-for="employee-email">
              <template #label>
                Email Address
                    <span class="text-danger">*</span>
              </template>
              <b-form-input
                id="employee-email"
                v-model="form.employee_email"
                type="email"
                :state="errors && errors.employee_email ? false : null"
                placeholder="Enter your email"
              />
              <b-form-invalid-feedback
                v-if="errors && errors.employee_email"
                id="employee-email-feedback"
              >
                {{ errors.employee_email[0] }}
              </b-form-invalid-feedback>
            </b-form-group>

            <!-- telephone-->
            <b-form-group class="col-md-6" label-for="telephone">
              <template #label>
                Telephone
                    <span class="text-danger">*</span>
              </template>
              <b-form-input
                id="telephone"
                v-model="form.telephone"
                type="number"
                :state="errors && errors.telephone ? false : null"
                placeholder="(xx) xxx xxxx xxx"
              />
              <b-form-invalid-feedback
                v-if="errors && errors.telephone"
                id="telephone-feedback"
              >
                {{ errors.telephone[0] }}
              </b-form-invalid-feedback>
            </b-form-group>
            </div>

            <!-- button -->
            <div class="form-group mb-0 d-flex justify-content-end">
              <button
                class="btn btn-success "
                type="submit"
              >
                Post vacancy
              </button>
            </div>
          </b-form>
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
      form: {
        // title: '',
        // employee_name: '',
        // employee_email: '',
        telephone: '0710000001'
      },
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
    async vacancies () {
      try {
        await this.$axios.post('api/employee/vacancies', this.form)
        await this.$router.replace({ path: '/employeer/myaccount' })
      } catch (error) {
        if (error.response.status === 422) {
          this.errors = error.response.data.errors
        }
      }
    },

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
