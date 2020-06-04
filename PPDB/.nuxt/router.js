import Vue from 'vue'
import Router from 'vue-router'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _7ed1faa6 = () => interopDefault(import('..\\pages\\about\\index.vue' /* webpackChunkName: "pages_about_index" */))
const _307bc354 = () => interopDefault(import('..\\pages\\daftar-sekolah.vue' /* webpackChunkName: "pages_daftar-sekolah" */))
const _01923fbc = () => interopDefault(import('..\\pages\\dashboard.vue' /* webpackChunkName: "pages_dashboard" */))
const _313ccbde = () => interopDefault(import('..\\pages\\login.vue' /* webpackChunkName: "pages_login" */))
const _554e0daa = () => interopDefault(import('..\\pages\\register.vue' /* webpackChunkName: "pages_register" */))
const _749e62e2 = () => interopDefault(import('..\\pages\\registrasi-sekolah\\index.vue' /* webpackChunkName: "pages_registrasi-sekolah_index" */))
const _252f2bdc = () => interopDefault(import('..\\pages\\siswa-baru\\index.vue' /* webpackChunkName: "pages_siswa-baru_index" */))
const _0a63539d = () => interopDefault(import('..\\pages\\walikelas\\index.vue' /* webpackChunkName: "pages_walikelas_index" */))
const _2ac73af4 = () => interopDefault(import('..\\pages\\about\\detail.vue' /* webpackChunkName: "pages_about_detail" */))
const _68f9801b = () => interopDefault(import('..\\pages\\about\\detail1.vue' /* webpackChunkName: "pages_about_detail1" */))
const _27ed3556 = () => interopDefault(import('..\\pages\\data-siswa\\absensi.vue' /* webpackChunkName: "pages_data-siswa_absensi" */))
const _c8469118 = () => interopDefault(import('..\\pages\\data-siswa\\daftar-nilai.vue' /* webpackChunkName: "pages_data-siswa_daftar-nilai" */))
const _acd1f750 = () => interopDefault(import('..\\pages\\data-siswa\\moodle-format.vue' /* webpackChunkName: "pages_data-siswa_moodle-format" */))
const _7048b1e6 = () => interopDefault(import('..\\pages\\pendaftaran\\daftar.vue' /* webpackChunkName: "pages_pendaftaran_daftar" */))
const _709b7448 = () => interopDefault(import('..\\pages\\pendaftaran\\details.vue' /* webpackChunkName: "pages_pendaftaran_details" */))
const _8e830ed2 = () => interopDefault(import('..\\pages\\registrasi-sekolah\\form.vue' /* webpackChunkName: "pages_registrasi-sekolah_form" */))
const _486ff836 = () => interopDefault(import('..\\pages\\sekolah\\guru.vue' /* webpackChunkName: "pages_sekolah_guru" */))
const _7a72045d = () => interopDefault(import('..\\pages\\sekolah\\jurusan.vue' /* webpackChunkName: "pages_sekolah_jurusan" */))
const _3cb34dcf = () => interopDefault(import('..\\pages\\sekolah\\kelas.vue' /* webpackChunkName: "pages_sekolah_kelas" */))
const _2288a4e9 = () => interopDefault(import('..\\pages\\sekolah\\pelajaran.vue' /* webpackChunkName: "pages_sekolah_pelajaran" */))
const _493b1e34 = () => interopDefault(import('..\\pages\\sekolah\\profile.vue' /* webpackChunkName: "pages_sekolah_profile" */))
const _c7caeaa6 = () => interopDefault(import('..\\pages\\registrasi-sekolah\\edit\\_id.vue' /* webpackChunkName: "pages_registrasi-sekolah_edit__id" */))
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
    path: "/about",
    component: _7ed1faa6,
    name: "about"
  }, {
    path: "/daftar-sekolah",
    component: _307bc354,
    name: "daftar-sekolah"
  }, {
    path: "/dashboard",
    component: _01923fbc,
    name: "dashboard"
  }, {
    path: "/login",
    component: _313ccbde,
    name: "login"
  }, {
    path: "/register",
    component: _554e0daa,
    name: "register"
  }, {
    path: "/registrasi-sekolah",
    component: _749e62e2,
    name: "registrasi-sekolah"
  }, {
    path: "/siswa-baru",
    component: _252f2bdc,
    name: "siswa-baru"
  }, {
    path: "/walikelas",
    component: _0a63539d,
    name: "walikelas"
  }, {
    path: "/about/detail",
    component: _2ac73af4,
    name: "about-detail"
  }, {
    path: "/about/detail1",
    component: _68f9801b,
    name: "about-detail1"
  }, {
    path: "/data-siswa/absensi",
    component: _27ed3556,
    name: "data-siswa-absensi"
  }, {
    path: "/data-siswa/daftar-nilai",
    component: _c8469118,
    name: "data-siswa-daftar-nilai"
  }, {
    path: "/data-siswa/moodle-format",
    component: _acd1f750,
    name: "data-siswa-moodle-format"
  }, {
    path: "/pendaftaran/daftar",
    component: _7048b1e6,
    name: "pendaftaran-daftar"
  }, {
    path: "/pendaftaran/details",
    component: _709b7448,
    name: "pendaftaran-details"
  }, {
    path: "/registrasi-sekolah/form",
    component: _8e830ed2,
    name: "registrasi-sekolah-form"
  }, {
    path: "/sekolah/guru",
    component: _486ff836,
    name: "sekolah-guru"
  }, {
    path: "/sekolah/jurusan",
    component: _7a72045d,
    name: "sekolah-jurusan"
  }, {
    path: "/sekolah/kelas",
    component: _3cb34dcf,
    name: "sekolah-kelas"
  }, {
    path: "/sekolah/pelajaran",
    component: _2288a4e9,
    name: "sekolah-pelajaran"
  }, {
    path: "/sekolah/profile",
    component: _493b1e34,
    name: "sekolah-profile"
  }, {
    path: "/registrasi-sekolah/edit/:id",
    component: _c7caeaa6,
    name: "registrasi-sekolah-edit-id"
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
