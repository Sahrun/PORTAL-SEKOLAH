import axios from 'axios'
export default {
  auth: {
    me: () => axios.get('auth/me'),
    login: (data) => axios.post('auth/login', data),
    logout: () => axios.get('auth/logout'),
    register:(data) => axios.post('auth/ppdb/register', data)
  },
  ppdb:{
    data_diri_save: (data) => axios.post('ppdb/data-diri-save',data),
    data_keluarga_save: (data) => axios.post('ppdb/data-keluarga-save',data),
    asal_sekolah_save: (data) => axios.post('ppdb/asal-sekolah-save',data),
  }
}