import * as types from './types'
import * as getters from './getters'
import * as actions from './actions'

const state = {
  company: false
}

const mutations = {
  [types.RECEIVE_COMPANY] (state, data) {
    state.company = data
  }
}

export default {
  state,
  mutations,
  actions,
  getters
}
