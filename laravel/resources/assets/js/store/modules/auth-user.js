import  * as types from './../mutations-type'
export default {
    state:{
        auth:false,
        name:'',
        email:'',
        mark:'hhhh'
    },
    mutations:{
        [types.SET_AUTH_USER](state,payload){
            console.log(payload.user);
            state.auth=true;
        }
    },
    actions :{
        setAuthUser({commit,dispatch}){
            console.log('set-auth-user');
            axios.get('/api/user').then( response => {
                commit({
                    type:types.SET_AUTH_USER
                })
            })
        }
    }
}