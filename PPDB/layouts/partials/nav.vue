<template>
   <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button> -->

          <!-- Topbar Search -->
          <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->
          <ul>
              <h2>PPBB</h2>
          </ul>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item no-arrow" v-if="!$store.state.auth.isLogin">
             <a class="nav-link" href="/register" role="button">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Register</span>
              </a>
            </li>
            <div class="topbar-divider d-none d-sm-block" v-if="!$store.state.auth.isLogin"></div>
            <li class="nav-item no-arrow" v-if="!$store.state.auth.isLogin">
             <a class="nav-link" href="/login" role="button">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Sign in</span>
              </a>
            </li>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow" v-if="$store.state.auth.isLogin">
              <a class="nav-link" id="userDropdown" role="button"  @click="logout()" style="cursor: pointer;">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Logout</span>
              </a>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
</template>
<script>
export default {
  data(){
        return {
            user:{
                email:'',
                password:'',
                remember_me:false
            }
        }
    },
    methods:{
        logout(){
            this.$store.dispatch('layout/load',true);
             this.$store.dispatch('auth/reset',this.user).then(result => {
                    this.$router.push('/login');
                }).catch(error => {
                  this.$store.dispatch('layout/load',false);
                  alert("gagal logout");
                  console.log(error);
                })
        }
    },
}
</script>