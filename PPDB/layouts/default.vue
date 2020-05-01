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
  </div>
</template>

<script>
  import Nav from './partials/nav';
  export default{
     components: {
           Nav
      }

  }
</script>

<style>
</style>
