<template>
    <div class="container-fluid" style="min-height:500px">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Wali Kelas</h1>
      </div>
        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">
               <div class="card shadow mb-4">
            <div class="card-header">
              <h6 class="m-0 font-weight-bold text-primary inline-block">Data Guru</h6>
              <div class="inline-block btn-left text-right">
                <button class="btn btn-primary btn-sm" @click="add">Tambah Data</button>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="dataTable_length"><label>Show <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                  <thead>
                    <tr role="row">
                        <th  tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"  style="width: 5px;">No</th>
                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 233.667px;">Nama</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 101px;">Mapel</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="min-width: 90px;">Wali Kelas</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="min-width: 105px;">Jumlah Siswa</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 80.6667px;">Keterangan</th>
                        <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <tr role="row" class="odd">
                      <td class="sorting_1">1</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>33</td>
                      <td>2008/11/28</td>
                      <td>$162,700</td>
                      <td><button class="btn btn-success btn-sm">Edit</button></td>
                    </tr><tr role="row" class="even">
                      <td class="sorting_1">2</td>
                      <td>Chief Executive Officer (CEO)</td>
                      <td>London</td>
                      <td>47</td>
                      <td>2009/10/09</td>
                      <td>$1,200,000</td>
                      <td><button class="btn btn-success btn-sm">Edit</button></td>
                    </tr>
                    <tr role="row" class="odd">
                      <td class="sorting_1">3</td>
                      <td>Junior Technical Author</td>
                      <td>San Francisco</td>
                      <td>66</td>
                      <td>2009/01/12</td>
                      <td>$86,000</td>
                      <td><button class="btn btn-success btn-sm">Edit</button></td>
                    </tr>
                    <tr role="row" class="even">
                      <td class="sorting_1">4</td>
                      <td>Software Engineer</td>
                      <td>London</td>
                      <td>41</td>
                      <td>2012/10/13</td>
                      <td>$132,000</td>
                      <td><button class="btn btn-success btn-sm">Edit</button></td>
                    </tr>
                    <tr role="row" class="odd">
                      <td class="sorting_1">5</td>
                      <td>Software Engineer</td>
                      <td>San Francisco</td>
                      <td>28</td>
                      <td>2011/06/07</td>
                      <td>$206,850</td>
                      <td><button class="btn btn-success btn-sm">Edit</button></td>
                    </tr>
                    <tr role="row" class="even">
                      <td class="sorting_1">6</td>
                      <td>Integration Specialist</td>
                      <td>New York</td>
                      <td>61</td>
                      <td>2012/12/02</td>
                      <td>$372,000</td>
                      <td><button class="btn btn-success btn-sm">Edit</button></td>
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
import Form from '../../components/walikelas/form-modal'
export default {
    components: {
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