<template>
  <div class="container">
    <div class="row">
      <div class="col-12">
            <div class="d-flex justify-content-end mr-2 mb-3">
              <NuxtLink :to="{ path: '/employeer/myaccount/add-vacancy'}">
                <button class="bg-warning text-white p-1 border-0 rounded">
                  <div>
                    POST YOUR AD
                  </div>
                </button>
              </NuxtLink>
            </div>
            <!-- <div class="d-flex justify-content-start ml-2 mx-0">
              <h5 class="header-title">
                My Vacancy List
              </h5>
            </div> -->
            <b-card no-body class="shadow-none border-0">
              <div>
                <MyVacancye />
              </div>
            </b-card>
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
