import * as types from './types'
import axios from 'axios'

export const addToWebCart = ({ commit, state }, items) => {
  items.forEach((item) => {
    const record = state.webCart.find(c => c.itemId === item.itemId)

    if (!record) {
      commit(types.ADD_TO_WEB_CART, {
        itemId: item.itemId,
        quantity: item.quantity
      })
    } else {
      let newQuantity = record.quantity + item.quantity
      let newItem = {
        index: state.webCart.indexOf(record),
        quantity: item.stock > newQuantity ? newQuantity : record.quantity
      }
      commit(types.UPDATE_QUANTITY_FROM_WEB_CART, newItem)
    }
  })
}

export const removeFromWebCart = ({ commit, state }, inventories) => {
  inventories.forEach((itemId) => {
    const record = state.webCart.find(c => c.itemId === itemId)

    if (record) {
      const indexItem = state.webCart.indexOf(record)
      commit(types.REMOVE_FROM_WEB_CART, indexItem)
    }
  })
}

export const updateQuantityFromWebCart = ({ commit, state }, item) => {
  const record = state.webCart.find(c => c.itemId === item.itemId)

  if (record) {
    let newItem = {
      index: state.webCart.indexOf(record),
      quantity: item.quantity
    }

    commit(types.UPDATE_QUANTITY_FROM_WEB_CART, newItem)
  }
}

export const checkoutWebCart = ({ commit }) => {
  commit(types.CHECKOUT_WEB_CART)
}

export const loadWebCartItems = ({ commit, state }) => {
  let inventories = []

  state.webCart.forEach((cartItem) => {
    inventories.push(cartItem.itemId)
  })

  if (state.webCart.length > 0) {
    axios.get(`${window.API_URL}/items/cart`,
      {
        params: {
          q: inventories
        },
        paramsSerializer: (params) => {
          return window.Qs.stringify(params, { arrayFormat: 'indices' })
        }
      })
      .then(({ data }) => {
        commit(types.RECEIVE_WEB_CART_ITEMS, data.data)

        let deleted = []
        state.webCart.forEach((c) => {
          let record = data.data.find((i) => i.itemId === c.itemId)
          if (record) {
            if (record.stock < c.quantity) {
              let newItem = {
                index: state.webCart.indexOf(c),
                quantity: record.stock
              }

              commit(types.UPDATE_QUANTITY_FROM_WEB_CART, newItem)
            } else if (!Number.isInteger(c.quantity)) {
              deleted.push(c)
            }
          } else {
            deleted.push(c)
          }
        })

        deleted.forEach((d) => {
          const indexItem = state.webCart.indexOf(d)
          commit(types.REMOVE_FROM_WEB_CART, indexItem)
        })
      })
  }
}
