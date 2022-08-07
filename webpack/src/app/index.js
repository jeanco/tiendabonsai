import Vue from 'vue'

import store from './config/store'
import router from './config/router'
import { sync } from 'vuex-router-sync'

import Root from './components/Root'
import registerFilters from './config/registerFilters'
import registerComponents from './config/registerComponents'

import VueScrollTo from 'vue-scrollto'
import VueProgressiveImage from 'vue-progressive-image'
import VueSweetalert2 from 'vue-sweetalert2'
import * as VueGoogleMaps from 'vue2-google-maps'

Vue.use(VueGoogleMaps, {
  load: {
    key: 'AIzaSyB5DgtOXdGEIDFUDkT9jK_EfN-UJIElU_0'
  }
})

Vue.use(VueSweetalert2)
Vue.use(VueProgressiveImage)
Vue.use(VueScrollTo)

registerComponents(Vue)
registerFilters(Vue)

sync(store, router)

const app = new Vue({
  router,
  store,
  ...Root
})

export { app, router, store }
