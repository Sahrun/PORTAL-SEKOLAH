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
    status_sekolah:()  => axios.get('param/status-sekolah')
  },
  sekolah:{
    register:(data) => axios.post('sekolah/register',data),
    grid:(param) => axios.get('sekolah/grid?'+param+''),
    by_id:(id) => axios.get('sekolah/by-id/'+id),
    update:(data) => axios.post('sekolah/update/',data)
  }
}