import * as types from './modules/cart/types'
import {WEB_CART_KEY} from './constants'

export function localStoragePlugin (store) {
  store.subscribe(({ type }, {
    cart: { webCart }
  }) => {
    switch (type) {
      case types.ADD_TO_WEB_CART:
      case types.REMOVE_FROM_WEB_CART:
      case types.UPDATE_QUANTITY_FROM_WEB_CART:
      case types.CHECKOUT_WEB_CART: {
        window.localStorage.setItem(WEB_CART_KEY, JSON.stringify(webCart))
        break
      }
      default: {
        //
      }
    }
  })
}
