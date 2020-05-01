import Vue from 'vue'
import Router from 'vue-router'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _08d77030 = () => interopDefault(import('..\\pages\\login.vue' /* webpackChunkName: "pages_login" */))
const _4aece7f4 = () => interopDefault(import('..\\pages\\register.vue' /* webpackChunkName: "pages_register" */))
const _c89ac148 = () => interopDefault(import('..\\pages\\sekolah.vue' /* webpackChunkName: "pages_sekolah" */))
const _2d0e3ede = () => interopDefault(import('..\\pages\\pendaftaran\\pendaftaran.vue' /* webpackChunkName: "pages_pendaftaran_pendaftaran" */))
const _31eca4d1 = () => interopDefault(import('..\\pages\\index.vue' /* webpackChunkName: "pages_index" */))
const _3e121279 = () => interopDefault(import('..\\pages\\pendaftaran\\pendaftaran' /* webpackChunkName: "" */))

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
    component: _08d77030,
    name: "login"
  }, {
    path: "/register",
    component: _4aece7f4,
    name: "register"
  }, {
    path: "/sekolah",
    component: _c89ac148,
    name: "sekolah"
  }, {
    path: "/pendaftaran/pendaftaran",
    component: _2d0e3ede,
    name: "pendaftaran-pendaftaran"
  }, {
    path: "/",
    component: _31eca4d1,
    name: "index"
  }, {
    path: "/pendaftaran",
    components: {
      default: _3e121279
    },
    name: "pendaftaran"
  }],

  fallback: false
}

export function createRouter () {
  return new Router(routerOptions)
}
