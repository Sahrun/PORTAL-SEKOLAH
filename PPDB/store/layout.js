import api from '~/api'
import {setAuthToken, resetAuthToken} from '~/utils/auth'
import cookies from 'js-cookie'
export const state = () => ({
  load: false,
})
export const mutations = {
  set_load (store, isload) {
    store.load = isload
  }
}
export const actions = {
  load ({commit}, isLoad) {
        commit('set_load', isLoad)
  }
}