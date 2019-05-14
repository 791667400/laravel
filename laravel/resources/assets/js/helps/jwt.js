export default {
   setToken(token){
       console.log('storage-start');
       window.localStorage.setItem('jwt_token',token);
   },
    getToken(){
       return window.localStorage.getItem('jwt_token');
    },
    removeToken(){
       window.localStorage.removeItem('jwt_token');
    }
}
