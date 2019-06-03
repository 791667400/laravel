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
            console.log(payload.myuser);
            state.auth=true;
            state.name=payload.myuser.name;
            state.email=payload.myuser.email
        }
    },
    actions :{
        setAuthUser({commit,dispatch}){
            console.log('set-auth-user');
            axios.get('/api/user').then( response => {
                commit({
                    type:types.SET_AUTH_USER,
                    myuser:response.data
                })
            })
        }
    }
}