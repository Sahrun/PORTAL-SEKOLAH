export default function ({store, redirect, route}) {
    const userIsLoggedIn = !!store.state.auth.user
    // const urlRequiresAuth = /^\/admin(\/|$)/.test(route.fullPath)
    if (!userIsLoggedIn && (route.fullPath !=='/' && route.fullPath !=='/register' && route.fullPath !=='/login')) {
        return redirect('/login')
    }
    if (userIsLoggedIn && (route.fullPath =='/login' || route.fullPath =='/register')) {
      return redirect('/')
    }
    return Promise.resolve()
  }