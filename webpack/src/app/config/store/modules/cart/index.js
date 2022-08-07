import * as types from './types'
import * as getters from './getters'
import * as actions from './actions'
import * as constants from '@/app/config/store/constants'

const state = {
  webCart: JSON.parse(window.localStorage.getItem(constants.WEB_CART_KEY) || '[]'),
  webCartItems: []
}

const mutations = {
  [types.RECEIVE_WEB_CART_ITEMS] (state, items) {
    state.webCartItems = items
  },

  [types.ADD_TO_WEB_CART] (state, item) {
    state.webCart.push(item)
  },

  [types.REMOVE_FROM_WEB_CART] (state, indexItem) {
    state.webCart.splice(indexItem, 1)
  },

  [types.UPDATE_QUANTITY_FROM_WEB_CART] (state, { index, quantity }) {
    state.webCart[index].quantity = quantity
  },

  [types.CHECKOUT_WEB_CART] (state) {
    state.webCart = []
  }
}

export default {
  state,
  mutations,
  actions,
  getters
}
