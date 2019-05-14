require('./bootstrap');
window.Vue = require('vue');
import VueRouter from 'vue-router'
import router from './routes'
import store from './store/index'
import App from './components/App'
import JwtToken from './helps/jwt'

axios.interceptors.request.use(function (config) {
    if(JwtToken.getToken()){
        config.headers['Authorization']='Bearer '+JwtToken.getToken();
    }
    return config;
},function (error) {
    return Promise.reject(error)
})

Vue.use(VueRouter);
Vue.component('app-name' ,App);
 new Vue({
    el: '#app',
     router, 
     store,
     JwtToken
});