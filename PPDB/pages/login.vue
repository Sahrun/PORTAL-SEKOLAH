<template>
     <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                  </div>
                  <form class="user" @submit.prevent="login">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="username" aria-describedby="username"
                       placeholder="Masukan Username" v-model="user.email"
                       v-bind:class="{'is-invalid' : (error.email && issubmit) }"
                        @change="error.email=''">
                        <div class="invalid-feedback">{{error.email}}</div>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" placeholder="Masukan Password" 
                      v-model="user.password"
                      v-bind:class="{'is-invalid' : (error.password && issubmit) }"
                      @change="error.password=''">
                      <div class="invalid-feedback">{{error.password}}</div>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" v-model="user.remember_me">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button class="btn btn-primary btn-user btn-block">Login</button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
</template>

<script>

export default {
    data(){
        return {
            user:{
                email:'',
                password:'',
                remember_me:false
            },
            error:{
                email:'',
                password:'',
                remember_me:false
            },
            issubmit:false,
        }
    },
    methods:{
        login(){
           var validation = this.validation();
            if(validation){
              this.$store.dispatch('layout/load',true);
              this.$store.dispatch('auth/login',this.user).then(result => {
                   this.$router.push('/');
                  }).catch(error => {
                    this.$store.dispatch('layout/load',false);
                    if(error.response.status){
                      this.error.password ="password salah"
                    }else{
                      alert("gagal login");
                    }
                })
            }
        },
        validation(){
          var valid = true;
          this.issubmit = true;
          if(!this.user.email){
              this.error.email="user name harus di isi"
              valid = false
          }if(!this.user.password){
              this.error.password="password harus di isi"
              valid = false
          }

          return valid;
          }
    },
    mounted(){
      this.$store.dispatch('layout/load',false);
      // console.log(this.$store.state);
    }
}
</script>