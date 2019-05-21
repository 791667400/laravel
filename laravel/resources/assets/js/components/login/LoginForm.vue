 <template>
                    <form class="form-horizontal" @submit.prevent="login_method">
                        
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input v-model="email" id="email" type="email" class="form-control" name="email" value="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input v-model="password" id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    login
                                </button>
                            </div>
                        </div>
</form>
</template>
<script>
       import JwtToken from './../../helps/jwt'
       export default {
              data(){
                return {
                    name :'',
                    email:'',
                    password:'',
                }
              },
              methods:{
                login_method(){
                       let formData={
                            username:this.email,
                            password:this.password,
                       }
                       axios.post('/api/login ',formData).then(response=>{
                            //JwtToken.setToken(response.data.access_token)
                           // var ss=JwtToken.getToken;
                            console.log(response);
                            // this.$router.push({name:'confirm'})
                       }).catch(function (error) {
                           console.log('error--');
                       　　console.log(error);
                       });
                }
              }
        }
</script>
