<template>
      <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Registrasi</h1>
              </div>
              <form class="user" @submit.prevent="register">
                <div class="form-group">
                  <input type="nama lengkap" class="form-control form-control-user" v-bind:class="{'is-invalid' : (error.name && issubmit) }" 
                   id="namalengkap" placeholder="Nama Lengkap" 
                  v-model="user.name"
                  @change="error.name=''">
                  <div class="invalid-feedback">{{error.name}}</div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="email" placeholder="Email" 
                  v-model="user.email"
                  v-bind:class="{'is-invalid' : (error.email && issubmit) }"
                  @change="error.email=''">
                  <div class="invalid-feedback">{{error.email}}</div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password" placeholder="Password" v-model="user.password"
                    v-bind:class="{'is-invalid' : (error.password && issubmit) }"
                    @change="error.password=''">
                    <div class="invalid-feedback">{{error.password}}</div>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password_confirmation" placeholder="Konfirmasi Password" v-model="user.password_confirmation"
                    v-bind:class="{'is-invalid' : (error.password_confirmation && issubmit) }"
                    @change="error.password_confirmation=''">
                    <div class="invalid-feedback">{{error.password_confirmation}}</div>
                  </div>
                </div>
                <button class="btn btn-primary btn-user btn-block">Registrasi sekarang</button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.html">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</template>

<script>
import api from '~/api'

export default {
    data(){
       return {
        user:{
          name:'',
          email:'',
          password:'',
          password_confirmation:''
        },
        error:{
          name:'',
          email:'',
          password:'',
          password_confirmation:''
        },
        issubmit:false,
      }
    },
    methods:{
      register(){
        var validation = this.validation();
        if(validation){
          api.auth.register(this.user)
          .then(response => {
              this.$router.push('/login');
          });
        }
        
      },
      validation(){
        var valid = true;
        this.issubmit = true;
        if(!this.user.name){
            this.error.name="Nama harus di isi"
            valid = false
        }if(!this.user.email){
            this.error.email="Email harus di isi"
            valid = false
        }if(!this.user.password){
            this.error.password="Password harus di isi"
            valid = false
        }if(!this.user.password_confirmation)
        {
            this.error.password_confirmation="Confirmasi Password harus di isi"
            valid = false
        }

        if(!!this.user.password && !!this.user.password_confirmation && (this.user.password != this.user.password_confirmation))
        {
          this.error.password_confirmation="Confirmasi Password salah"
          valid = false
        }

        return valid;
      }
    }
}
</script>