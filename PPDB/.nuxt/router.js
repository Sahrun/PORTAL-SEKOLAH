import Vue from 'vue'
import Router from 'vue-router'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _313ccbde = () => interopDefault(import('..\\pages\\login.vue' /* webpackChunkName: "pages_login" */))
const _554e0daa = () => interopDefault(import('..\\pages\\register.vue' /* webpackChunkName: "pages_register" */))
const _6d17e976 = () => interopDefault(import('..\\pages\\sekolah.vue' /* webpackChunkName: "pages_sekolah" */))
const _7048b1e6 = () => interopDefault(import('..\\pages\\pendaftaran\\daftar.vue' /* webpackChunkName: "pages_pendaftaran_daftar" */))
const _709b7448 = () => interopDefault(import('..\\pages\\pendaftaran\\details.vue' /* webpackChunkName: "pages_pendaftaran_details" */))
const _1db9f6fa = () => interopDefault(import('..\\pages\\index.vue' /* webpackChunkName: "pages_index" */))
const _267c5364 = () => interopDefault(import('..\\pages\\pendaftaran\\daftar' /* webpackChunkName: "" */))

// TODO: remove in Nuxt 3
const emptyFn = () => {}
const originalPush = Router.prototype.push
Router.prototype.push = function push (location, onComplete = emptyFn, onAbort) {
  return originalPush.call(this, location, onComplete, onAbort)
}

Vue.use(Router)

export const routerOptions = {
  mode: 'history',
  base: decodeURI('/'),
  linkActiveClass: 'nuxt-link-active',
  linkExactActiveClass: 'nuxt-link-exact-active',
  scrollBehavior,

  routes: [{
    path: "/login",
    component: _313ccbde,
    name: "login"
  }, {
    path: "/register",
    component: _554e0daa,
    name: "register"
  }, {
    path: "/sekolah",
    component: _6d17e976,
    name: "sekolah"
  }, {
    path: "/pendaftaran/daftar",
    component: _7048b1e6,
    name: "pendaftaran-daftar"
  }, {
    path: "/pendaftaran/details",
    component: _709b7448,
    name: "pendaftaran-details"
  }, {
    path: "/",
    component: _1db9f6fa,
    name: "index"
  }, {
    path: "/pendaftaran/edit",
    components: {
      default: _267c5364
    },
    name: "pendaftaran"
  }],

  fallback: false
}

export function createRouter () {
  return new Router(routerOptions)
}
