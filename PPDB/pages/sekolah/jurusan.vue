<template>
    <div class="container-fluid" style="min-height:500px">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Sekolah</h1>
      </div>
        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">
               <Tab/>
               <div class="card shadow mb-4">
            <div class="card-header">
              <h6 class="m-0 font-weight-bold text-primary inline-block">Data Jurusan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="dataTable_length"><label>Show <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                  <thead>
                     <tr role="row">
                        <th>#</th>
                        <th><input type="text" class="form-control" placeholder="Nama Jurusan"/></th>
                        <th><textarea class="form-control" placeholder="Keterangan" rows="1"></textarea></th>
                        <th><button class="btn btn-primary btn-sm">Tambah</button></th>
                    </tr>
                    <tr role="row">
                        <th  tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"  style="width: 5px;">No</th>
                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 233.667px;">Nama Jurusan</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 60%;">Keterangan</th>
                        <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <tr role="row" class="odd">
                      <td class="sorting_1">1</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td><button class="btn btn-warning btn-sm">Delete</button></td>
                    </tr><tr role="row" class="even">
                      <td class="sorting_1">2</td>
                      <td>Chief Executive Officer (CEO)</td>
                      <td>London</td>
                      <td><button class="btn btn-warning btn-sm">Delete</button></td>
                    </tr>
                    <tr role="row" class="odd">
                      <td class="sorting_1">3</td>
                      <td>Junior Technical Author</td>
                      <td>San Francisco</td>
                     <td><button class="btn btn-warning btn-sm">Delete</button></td>
                    </tr>
                    <tr role="row" class="even">
                      <td class="sorting_1">4</td>
                      <td>Software Engineer</td>
                      <td>London</td>
                      <td><button class="btn btn-warning btn-sm">Delete</button></td>
                    </tr>
                    <tr role="row" class="odd">
                      <td class="sorting_1">5</td>
                      <td>Software Engineer</td>
                      <td>San Francisco</td>
                      <td><button class="btn btn-warning btn-sm">Delete</button></td>
                    </tr>
                    <tr role="row" class="even">
                      <td class="sorting_1">6</td>
                      <td>Integration Specialist</td>
                      <td>New York</td>
                      <td><button class="btn btn-warning btn-sm">Delete</button></td>
                    </tr>
                    </tbody>
                </table>
                </div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
              </div>
            </div>
          </div>
            </div>
        </div>
        <Form/>
    </div>
</template>

<script>
import Tab from '../../components/sekolah/tabs'
import Form from '../../components/sekolah/kelas/form-modal'
export default {
    components: {
        Tab,
        Form
    },
    layout: 'admin',
    data(){
        return {
            data:{}
        }
    },
    methods:{
        add(){
            $("#form").modal('show');
           
        }
    }
}
</script>

<style scoped>
.inline-block{
    display: inline-block;
}
.btn-left{
    width: 91%;
}
</style>