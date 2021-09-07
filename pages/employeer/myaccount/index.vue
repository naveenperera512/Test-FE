<template>
  <div class="container mt-3">
    <div class="row">
        <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="header-title mb-3">
              My Profile
            </h4><h4 class="header-title mb-3" />
            <b-card no-body class="shadow-none border-0">
              <b-tabs
                pills
                card
                vertical
                nav-class="bg-white p-0"
                active-tab-class="pt-1"
                nav-wrapper-class="col-sm-3"
                content-class="pt-0"
              >
                <b-tab title="My Vacancy List">
                  <b-card-text>
                    <MyVacancyList />
                    </b-card-text>
                </b-tab>
                <b-tab title="Settings">
                  <b-card-text>
                    <Settings />
                  </b-card-text>
                </b-tab>
              </b-tabs>
            </b-card>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import MyVacancyList from './myvacancy-list/index'
import Settings from './settings/index'
export default {
  components: {
    MyVacancyList,
    Settings
  },
  methods: {}
}
</script>
