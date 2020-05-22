export default function ({store, redirect, route}) {
    const userIsLoggedIn = !!store.state.auth.user
    // const urlRequiresAuth = /^\/admin(\/|$)/.test(route.fullPath)

    if (!userIsLoggedIn && (route.fullPath !=='/' && route.fullPath !=='/register' && route.fullPath !=='/login')) {
        return redirect('/login')
    }
    if (userIsLoggedIn) {
      if((route.fullPath =='/login' || route.fullPath =='/register'))
      {
        return redirect('/')
      }
      else{
         if(store.state.auth.user.role == "calon_siswa")
         {
           if(store.state.auth.user.is_complete == true
             && (route.fullPath !== "/pendaftaran/details" && route.fullPath !== "/pendaftaran/edit"))
             {
               return redirect('/pendaftaran/details')
             }
             else if(store.state.auth.user.is_complete == null && store.state.auth.user.current_step == null)
             {
              if((route.fullPath !== "/pendaftaran/details" || route.fullPath !== "/pendaftaran/edit")
                 && route.fullPath !== "/" && route.fullPath !== "/pendaftaran/daftar" && route.fullPath !== "/daftar-sekolah")
              {
                return redirect('/')
              }
             }else if(store.state.auth.user.is_complete == null && store.state.auth.user.current_step !== null && route.fullPath !== "/pendaftaran/daftar"){
              return redirect('/pendaftaran/daftar')
             }
        }else if(store.state.auth.user.role == "user"){
            // return redirect('/dashboard')
        }
      }
    }
    return Promise.resolve()
  }