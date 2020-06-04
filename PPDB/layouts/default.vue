<template>
  <div>
     <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
          <div id="content">
            <Nav />
            <!-- Begin Page Content -->
            <nuxt />
            <!-- /.container-fluid -->
          </div>
          
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
        </div>
     </div>
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
      </a>
      <div id="overlay"
      :class="$store.state.layout.load == true ? 'overlay-show' : 'overlay-hide' "
       >
        <div class="spinner"></div>
        <br/>
        Loading...
      </div>
    </div>
</template>

<script>
  import Nav from './partials/nav';
  export default{
     components: {
           Nav
      },
      created(){
       if (process.browser) {
          window.onNuxtReady((app) => {
            this.$store.dispatch('layout/load',false);
          })
        }
      }

  }
 
</script>

<style>
  #overlay {
    background: #ffffff;
    color: #666666;
    position: fixed;
    height: 100%;
    width: 100%;
    z-index: 5000;
    top: 0;
    left: 0;
    float: left;
    text-align: center;
    padding-top: 25%;
    /* opacity: .80; */
    opacity:  0.8;
  }
  .overlay-hide{
    display: none;
    /* transition-delay: 30s; */
  }
  .overlay-show{
      display: block;
  }
  .spinner {
    margin: 0 auto;
    height: 64px;
    width: 64px;
    animation: rotate 0.8s infinite linear;
    border: 5px solid #031d52;
    border-right-color: transparent;
    border-radius: 50%;
  }
  @keyframes rotate {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
  }
</style>
