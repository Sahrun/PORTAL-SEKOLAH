import api from '~/api'
import {setAuthToken, resetAuthToken} from '~/utils/auth'
import cookies from 'js-cookie'
export const state = () => ({
  user: null,
  isLogin:null
})
export const mutations = {
  set_user (store, data) {
    store.user = data
    store.isLogin = true
  },
  reset_user (store) {
    store.user = null
    store.isLogin = false
  }
}
export const actions = {
  fetch ({commit}) {
    return api.auth.me()
      .then(response => {
        commit('set_user', response.data.data)
        return response
      })
      .catch(error => {
        commit('reset_user')
        return error
      })
  },
  login ({commit}, data) {
    return api.auth.login(data)
      .then(response => {
        commit('set_user', response.data.user)
        setAuthToken(response.data.access_token)
        var exp = new Date(response.data.expires_at)
        cookies.set('x-access-token', response.data.access_token, {expires: exp})
        return response
      })
  },
  reset ({commit}) {
    return api.auth.logout()
    .then(response => {
     commit('reset_user')
     resetAuthToken()
     cookies.remove('x-access-token')
     return response
    })
  }
}