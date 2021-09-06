<template>
<div>
    <PageHeader :title="title" />
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div>
                      <div>
                        <Profile />
                      </div>
                      <div>
                        <Password />
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import Profile from './update-profile'
import Password from './update-password'

export default {
  head() {
        return {
            title: `${this.title}`,
        };
    },
    data() {
        return {
            title: "Settings",
        };
    },
  components: {
    Profile,
    Password
  },
  methods: {}
}
</script>
