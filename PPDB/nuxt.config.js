
export default {
  mode: 'universal',
  /*
  ** Headers of the page
  */
  head: {
    title: process.env.npm_package_name || '',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: process.env.npm_package_description || '' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
      { rel: 'stylesheet', href:'https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i'}
    ],
    script: [
      { src: "/vendor/jquery/jquery.min.js", body: true  },
      { src: "/vendor/bootstrap/js/bootstrap.bundle.min.js", body: true  },
      { src: "/js/sb-admin-2.min.js", body: true  },
      { src: "/vendor/chart.js/Chart.min.js", body: true  }
    ]
  },
  
  router: {
    middleware: ['auth'],
    extendRoutes (routes, resolve) {
      routes.push({
        path: '/pendaftaran/edit',
        name:'pendaftaran',
        components: {
          default: resolve(__dirname, 'pages/pendaftaran/daftar'), // or routes[index].component
        }
      })
    }
  },
  /*
  ** Customize the progress-bar color
  */
  loading: { color: '#fff' },
  /*
  ** Global CSS
  */
  css: [
    '@/assets/css/sb-admin-2.min.css',
    '@/assets/vendor/fontawesome-free/css/all.min.css',
    '@/assets/vendor/dataTables.bootstrap4.min.css'
  ],
  /*
  ** Plugins to load before mounting the App
  */
  plugins: [
    '~/api/init.js',
  ],
  /*
  ** Nuxt.js dev-modules
  */
  buildModules: [
  ],
  /*
  ** Nuxt.js modules
  */
  modules: [
    '@nuxtjs/axios',
  ],
  /*
  ** Build configuration
  */
  build: {
    /*
    ** You can extend webpack config here
    */
    extend (config, ctx) {
    },
  }
}
