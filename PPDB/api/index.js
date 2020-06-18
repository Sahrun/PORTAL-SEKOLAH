import axios from 'axios'
export default {
  auth: {
    me: () => axios.get('auth/me'),
    login: (data) => axios.post('auth/login', data),
    logout: () => axios.get('auth/logout'),
    register:(data) => axios.post('auth/ppdb/register', data)
  },
  ppdb:{
    list:() => axios.get('ppdb/list'),
    data_diri_save: (data) => axios.post('ppdb/data-diri-save',data,{headers: {'Content-Type': 'multipart/form-data'}}),
    data_keluarga_save: (data) => axios.post('ppdb/data-keluarga-save',data),
    asal_sekolah_save: (data) => axios.post('ppdb/asal-sekolah-save',data),
    initial_parameter: () => axios.get('ppdb/initial-parameter'),
    info_user: () => axios.get('ppdb/info-user'),
    resume_save: (data) => axios.post('ppdb/resume-save',data,{headers: {'Content-Type': 'multipart/form-data'}}),
  },
  param:{
    status_sekolah:()  => axios.get('param/status-sekolah'),
    add_kelas:() => axios.get('param/add-kelas'),
  },
  sekolah:{
    register:(data) => axios.post('sekolah/register',data),
    grid:(param) => axios.get('sekolah/grid?'+param+''),
    by_id:(id) => axios.get('sekolah/by-id/'+id),
    update:(data) => axios.post('sekolah/update/',data),
    profile:() => axios.get('sekolah/profile'),
    update_profile:(data) => axios.post('sekolah/update-profile',data)
  },
  guru:{
      grid:(param) => axios.get('guru/grid?'+param+''),
      save:(data) => axios.post('guru/save',data),
      by_id:(id) => axios.get('guru/by-id/'+id),
      update:(data) => axios.post('guru/update',data)
  },
  jurusan:{
    grid:(param) => axios.get('jurusan/grid?'+param+''),
    save:(data) => axios.post('jurusan/save',data),
    delete:(id) => axios.get('jurusan/delete/'+id),
  },
  wali_kelas:{
    grid:(param) => axios.get('wali-kelas/grid?'+param+'')
  },
  sub_kelas:{
    save:(data)   => axios.post('sub-kelas/save',data),
    grid:(param)  => axios.get('sub-kelas/grid?'+param),
    edit:(id)     => axios.get('sub-kelas/edit/'+id),
    update:(data) => axios.post('sub-kelas/update',data),
  } 
}