import axios from 'axios'
import {prefixToken} from '~/config'
export function setAuthToken (token) {
  axios.defaults.headers.common['Authorization'] = prefixToken + token
}
export function resetAuthToken () {
  delete axios.defaults.headers.common['Authorization']
}