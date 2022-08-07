import * as types from './types'
import * as getters from './getters'
import * as actions from './actions'

const state = {
  categories: [],
  categoriesOutstanding: []
}

const mutations = {
  [types.RECEIVE_CATEGORIES] (state, data) {
    state.categories = data
  },
  [types.RECEIVE_CATEGORIES_OUTSTANDING] (state, data) {
    state.categoriesOutstanding = data
  }
}

export default {
  state,
  mutations,
  actions,
  getters
}
