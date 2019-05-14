import JwtToken from './../../helps/jwt'

export default {
    actions:{
        loginRequest({dispatch},formData){
            axios.post('/oauth/token ',formData).then(response=>{
                JwtToken.setToken(response.data.access_token)
                dispatch('setAuthUser')
            }).catch(error=>{
                console.log(error.response)
            })
        }
    }
}