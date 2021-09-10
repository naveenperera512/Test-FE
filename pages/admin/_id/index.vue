<template>
  <div class="row mt-3">
    <b-col
      md="1"
    />
    <b-col
      md="10"
    >
      <div class="card">
        <div class="col-12 my-3">
          <h5>
            <nuxt-link to="/admin" class="btn bg-info ml-2">
              Back
            </nuxt-link><span class="ml-2">Add Category</span>
          </h5>
        </div>

        <div class="col-sm-12 col-md-11 card-body">
          <b-form
            @submit.prevent="addCategoryInformation"
          >
            <!-- name -->
            <b-form-group label-for="name">
              <template #label>
                Category Name <span class="text-danger">*</span>
              </template>
              <b-form-input
                id="name"
                v-model="categories.name"
                type="text"
                :state="errors && errors.name ? false : null"
                placeholder="Enter name"
                :value="'categories.name'"
                required
              />
              <b-form-invalid-feedback
                v-if="errors && errors.name"
                id="name-feedback"
              >
                {{ errors.name[0] }}
              </b-form-invalid-feedback>
            </b-form-group>
            <!-- description -->
            <b-form-group label-for="description">
              <template #label>
                Category Description <span class="text-danger">*</span>
              </template>
              <b-form-input
                id="description"
                v-model="categories.description"
                type="text"
                :state="errors && errors.description ? false : null"
                placeholder="Enter Category Description"
                required
              />
              <b-form-invalid-feedback
                v-if="errors && errors.description"
                id="description-feedback"
              >
                {{ errors.description[0] }}
              </b-form-invalid-feedback>
            </b-form-group>

            <!-- slug -->
            <b-form-group label-for="slug">
              <template #label>
                Slug <span class="text-danger">*</span>
              </template>
              <b-form-input
                id="slug"
                v-model="categories.slug"
                type="text"
                :state="errors && errors.slug ? false : null"
                placeholder="Enter slug"
                required
              />
              <b-form-invalid-feedback
                v-if="errors && errors.slug"
                id="slug-feedback"
              >
                {{ errors.slug[0] }}
              </b-form-invalid-feedback>
            </b-form-group>

            <!-- button-->
            <div
              class="d-flex justify-content-end"
            >
              <b-button
                type="submit"
                variant="primary"
                class="mt-n2 ml-2"
              >
                Save
              </b-button>
            </div>
          </b-form>
        </div>
      </div>
    </b-col>
    <b-col
      md="1"
    />
  </div>
</template>

<script>

export default {
  components: {

  },
  asyncData ({ $auth, redirect }) {
    if (!$auth.loggedIn) {
      redirect('/')
    }
  },
  data () {
    return {
      errors: {},
      categories: {
        name: '' ,
        description: '',
        slug: ''
      }
    }
  },
  created() {
    try {
      this.$axios.get(`api/admin/categories/${this.$route.params.id}`)
        .then((response) => {
          this.categories = (response.data).data
        })
    } catch (error) {
      // eslint-disable-next-line no-console
      console.log(error)
    }
  },
  methods: {
    async addCategoryInformation () {
      try {
        await this.$axios.put(`api/admin/categories/${this.$route.params.id}`, this.categories)
        await this.$router.replace({ path: '/admin' })
      } catch (error) {
        if (error.response.status === 422) {
          this.errors = error.response.data.errors
        }
      }
    }
  }
}
</script>


