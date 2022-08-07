import * as types from './types'

import axios from 'axios'

export const loadCompany = ({commit}) => {
  axios.get(`${window.API_URL}/company`)
    .then(({data}) => {
      commit(types.RECEIVE_COMPANY, data.data)
    })
}
