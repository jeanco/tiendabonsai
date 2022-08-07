import Vue from 'vue'
import Vuex from 'vuex'

import createLogger from 'vuex/dist/logger'
import {localStoragePlugin} from './plugins'

import ajax from './modules/ajax'
import company from './modules/company'
import categories from './modules/categories'
import cart from './modules/cart'
// import services from './modules/services'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
  modules: {
    ajax,
    company,
    categories,
    cart
    // services
  },
  strict: debug,
  plugins: debug ? [createLogger(), localStoragePlugin] : [localStoragePlugin]
})
