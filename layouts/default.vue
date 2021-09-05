<script>
import {
  mapState
} from "vuex"

import Vertical from "./vertical"
import Horizontal from "./horizontal"
import Detached from "./detached"
import TwoColumn from "./two-column"
import Footer2 from "../components/Footer2.vue"
import Topbar2 from "../components/Topbar2.vue"
/**
 * Default Layout
 */
export default {
  components: {
    Vertical,
    Horizontal,
    Detached,
    TwoColumn,
    Footer2,
    Topbar2
  },
  data() {
    return {}
  },
  computed: mapState(["layout"]),
  mounted() {
    if (this.$route.query.layout) {
      this.$store.dispatch('layout/changeLayoutType', {
        layoutType: this.$route.query.layout
      })
    }
  }
}
</script>

<template>
  <div>
    <Vertical
     v-if="$auth.loggedIn && $auth.user.is_admin === 1  &&
      layout.layoutType === 'vertical'"
      :layout="layout.layoutType"
    >
      <Nuxt />
    </Vertical>
    
    <Topbar2
    v-if="!$auth.loggedIn || $auth.loggedIn && $auth.user.is_admin === 0 " />

    <Nuxt style="min-height: 70vh"
    v-if="!$auth.loggedIn || $auth.loggedIn && $auth.user.is_admin === 0 " />

    <Footer2
    v-if="!$auth.loggedIn || $auth.loggedIn && $auth.user.is_admin === 0 " />

    <Horizontal
      v-if="$auth.loggedIn && $auth.user.is_admin === 1  &&
      layout.layoutType === 'horizontal'"
      :layout="layout.layoutType"
    >
      <slot />
    </Horizontal>

    <Detached
    v-if="$auth.loggedIn && $auth.user.is_admin === 1  &&
     layout.layoutType === 'detached'"
      :layout="layout.layoutType"
    >
      <slot />
    </Detached>

    <TwoColumn
    v-if="$auth.loggedIn && $auth.user.is_admin === 1  &&
      layout.layoutType === 'two-column'"
      :layout="layout.layoutType"
    >
      <slot />
    </TwoColumn>
  </div>
</template>
