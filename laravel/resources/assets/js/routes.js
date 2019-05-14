import VueRouter from 'vue-router'
import store from './store/index'
import JwtToken from './helps/jwt'

let routes=[
    {
        path:'/',
        component:require('./components/pages/Home'),
        meta:{}
    },
    {
        path:'/about',
        component:require('./components/pages/About'),
        meta:{}
    },
    {
        path:'/posts/:id',
        name:'posts_name',
        component:require('./components/posts/Post'),
        meta:{}
    },
    {
        path:'/register',
        name:'register',
        component:require('./components/register/Register'),
        meta:{}
    },
    {
        path:'/login',
        name:'login',
        component:require('./components/login/Login'),
        meta:{}
    },
    {
        path:'/login1',
        name:'login1',
        component:require('./components/login/Login1'),
        meta:{}
    },
    {
        path:'/confirm',
        name:'confirm',
        component:require('./components/confirm/Email'),
        meta:{}
    },
    {
        path:'/profile',
        name:'profile',
        component:require('./components/user/Profile'),
        meta:{requireAuth:true}
    }
]
/*
export default new VueRouter({
    mode:'history',
    routes
})
*/

const router    =   new VueRouter({
    mode:'history',
    routes
})

router.beforeEach((to,from,next)=>{
    if(to.requireAuth){
        if(store.state.auth && JwtToken.getToken()){
            return next()
        }else{
            return next({'name':'login'})
        }
    }
    return next()
})
export  default  router