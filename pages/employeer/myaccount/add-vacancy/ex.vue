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
              <!-- category-->
              <b-form-group class="col-md-12" label-for="category_id">
                <template #label>
                  Category
                  <span class="text-danger">*</span>
                </template>
                <b-form-select
                  id="category_id"
                  v-model="form.category_id"
                  class="form-control "
                  type="text"
                  :state="errors && errors.category_id? false : null">
                  <option value="">-- Please select an option --</option>
                  <option v-for="category in categories.data" :value="category.id">
                    {{ category.name }}
                  </option>
                </b-form-select>
                <b-form-invalid-feedback
                  v-if="errors && errors.category_id"
                  id="telephone-feedback"
                >
                  {{ errors.category_id[0] }}
                </b-form-invalid-feedback>
              </b-form-group>

              <!-- jobtype-->
              <b-form-group class="col-md-12" label-for="job_type_id">
                <template #label>
                  Job Type
                  <span class="text-danger">*</span>
                </template>
                <b-form-select
                  id="job_type_id"
                  v-model="form.job_type_id"
                  class="form-control "
                  type="text"
                  :state="errors && errors.job_type_id? false : null">
                  <option value="">-- Please select an option --</option>
                  <option v-for="job_type in jobtypes.data" :value="job_type.id">
                    {{ job_type.name }}
                  </option>
                </b-form-select>
                <b-form-invalid-feedback
                  v-if="errors && errors.job_type_id"
                  id="telephone-feedback"
                >
                  {{ errors.job_type_id[0] }}
                </b-form-invalid-feedback>
              </b-form-group>

              <!-- district-->
              <b-form-group class="col-md-6" label-for="district_id">
                <template #label>
                  District
                  <span class="text-danger">*</span>
                </template>
                <b-form-select
                  id="district_id"
                  v-model="district_id = form.district_id"
                  class="form-control "
                  type="text"
                  :state="errors && errors.district_id? false : null">
                  <option value="">-- Please select an option --</option>
                  <option v-for="district in districts.data" :value="district.id">
                    {{ district.name }}
                  </option>
                </b-form-select>
                <b-form-invalid-feedback
                  v-if="errors && errors.district_id"
                  id="telephone-feedback"
                >
                  {{ errors.district_id[0] }}
                </b-form-invalid-feedback>
              </b-form-group>

              <!-- district city-->
              <b-form-group class="col-md-6" label-for="district_city_id">
                <template #label>
                  District City
                  <span class="text-danger">*</span>
                </template>
                <b-form-select
                  id="district_city_id"
                  v-model="form.district_city_id"
                  class="form-control "
                  type="text"
                  :state="errors && errors.district_city_id? false : null">
                  <option value="">-- Please select an option --</option>
                  <option v-for="district_city in cities.data" :value="district_city.id">
                    {{ district_city.name }}
                  </option>
                </b-form-select>
                <b-form-invalid-feedback
                  v-if="errors && errors.district_city_id"
                  id="telephone-feedback"
                >
                  {{ errors.district_city_id[0] }}
                </b-form-invalid-feedback>
              </b-form-group>
            </div>



            <!-- description -->
            <div class="row">
              <div class="col-md-12">
                <div class="form-group mt-3">
                  <label>Description</label>
                  <p class="text-muted font-13 m-b-30">Snow is a clean, flat toolbar theme.</p>
                  <quill-editor :options="editorOption" id="description" v-model="form.description" type="text" style="min-height: 250px;"/>
                </div>
              </div>
            </div>

            <!-- file upload -->
            <!-- <div class="row">
              <div class="col-md-12">
                <div class="form-group mt-3">
                  <label>Image Upload</label>
                  <p class="text-muted font-13 m-b-30">DropzoneJS is an open source library that provides drag’n’drop
                    file
                    uploads with image previews.</p>
                  <vue-dropzone id="cv_image" ref="myVueDropzone" :options="dropzoneOptions" v-model="form.cv_image" :use-custom-slot="true">
                    <div class="dz-message needsclick">
                      <i class="h1 text-muted ri-upload-cloud-2-line"></i>
                      <h3>Drop files here or click to upload.</h3>
                      <span class="text-muted font-13">(This is just a demo cv_image. Selected files are
                                <strong>not</strong> actually uploaded.)</span>
                    </div>
                  </vue-dropzone>

                </div>
              </div>
            </div> -->

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

              <!-- email address-->
              <b-form-group class="col-md-6" label-for="employee_email">
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
// import vue2Dropzone from 'vue2-dropzone'

/**
 * Checkout component
 */
export default {
  components: {
    // vueDropzone: vue2Dropzone
  },
  data() {
    return {
      errors: {},
      district_id: '',
      form: {
        title: '',
        user_id: '3',
        slug: 'a',
        category_id: '',
        job_type_id: '',
        district_id: '',
        district_city_id: '',
        employee_name: '',
        employee_email: '',
        telephone: '',
        description: '',
        // cv_image: ''
      },
      categories: {},
      jobtypes: {},
      districts: {},
      cities: {},
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
            ], ,
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
      // dropzoneOptions: {
      //   url: 'https://httpbin.org/post',
      //   thumbnailWidth: 150,
      //   maxFilesize: 0.5,
      //   headers: {
      //     'My-Awesome-Header': 'header value'
      //   },
      //   previewTemplate: this.template()
      // }
    }
  },

  created() {
    this.getCityList()
  },
  mounted (){
    try {
      this.$axios.get('api/categories')
        .then((response) => {
          this.categories = (response.data)
        });
    } catch (error) {
      // eslint-disable-next-line no-console
      console.log(error)
    }
    try {
      this.$axios.get('api/jobTypes')
        .then((response) => {
          this.jobtypes = (response.data)
        });
    } catch (error) {
      // eslint-disable-next-line no-console
      console.log(error)
    }
    try {
      this.$axios.get('api/districts')
        .then((response) => {
          this.districts = (response.data)
        });
      this.getCityList();
    } catch (error) {
      // eslint-disable-next-line no-console
      console.log(error)
    }

  },
  watch: {
    district_id(value) { this.getCityList();}
  },

  methods: {
    async vacancies () {
      try {
        await this.$axios.get('sanctum/csrf-cookie')
        await this.$axios.post('api/employee/vacancies', this.form)
        await this.$router.replace({ path: '/employeer/myaccount' })
      } catch (error) {
        if (error.response.status === 422) {
          this.errors = error.response.data.errors
        }
      }
    },
    getCityList() {
      try {
        this.$axios.get('api/districts/' + this.district_id +'/cities')
          .then((response) => {
            this.cities = (response.data)
          })
      } catch (error) {
        // eslint-disable-next-line no-console
        console.log(error)
      }
    }

    // template: function () {
    //   return ` <div class="dropzone-previews mt-3">
    //         <div class="card mt-1 mb-0 shadow-none border">
    //             <div class="p-2">
    //                 <div class="row align-items-center">
    //                     <div class="col-auto">
    //                         <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
    //                     </div>
    //                     <div class="col pl-0">
    //                         <a href="javascript:void(0);" class="text-muted font-weight-bold" data-dz-name></a>
    //                         <p class="mb-0" data-dz-size></p>
    //                     </div>
    //                     <div class="col-auto">
    //                         <!-- Button -->
    //   <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
    //   <i class="fe-x"></i>
    //   </a>
    //   </div>
    //   </div>
    //   </div>
    //   </div>
    //   </div>
    //   `
    //   }
  }
}

</script>

