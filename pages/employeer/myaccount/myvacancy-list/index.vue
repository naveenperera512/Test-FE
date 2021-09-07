<template>
  <div class="container">
    <div class="row">
      <div class="col-12">
          <div class="card-body">
            <div class="d-flex justify-content-center">
              <NuxtLink :to="{ path: '/employeer/myaccount/add-vacancy'}">
                <button class="bg-warning text-white p-1 border-0">
                  <div class="mx-2">
                    POST YOUR AD
                  </div>
                </button>
              </NuxtLink>
            </div>
            <h4 class="header-title mb-3">
              My Vacancy List
            </h4><h4 class="header-title mb-3" />
            <b-card no-body class="shadow-none border-0">
              <div>
                <MyVacancye />
              </div>
            </b-card>
          </div>
        </div>
    </div>
  </div>
</template>
<script>
import AddVacancy from '../add-vacancy/index'
import MyVacancye from '@/components/employeer/MyVacancy'

export default {
  data() {
    return {
      vacancies: {}
    }
  },
  components:{
    AddVacancy,
    MyVacancye
  },
  methods: {
  }
}
</script>
