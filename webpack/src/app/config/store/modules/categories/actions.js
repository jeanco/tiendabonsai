import * as types from './types'

import axios from 'axios'

export const loadCategories = ({commit}) => {
  axios.get(`${window.API_URL}/categories`)
    .then(({data}) => {
      commit(types.RECEIVE_CATEGORIES, data.data)
    })
}

export const loadCategoriesOutstanding = ({commit}) => {
  axios.get(`${window.API_URL}/categories/outstanding`)
    .then(({data}) => {
      commit(types.RECEIVE_CATEGORIES_OUTSTANDING, data.data)
    })
}
