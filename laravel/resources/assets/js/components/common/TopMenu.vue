<template>
                        <div class="navbar-collapse collapse" role="navigation">
                       
                            <ul class="nav navbar-nav">
                                <li class="hidden-sm hidden-md"><router-link to="/">文章</router-link></li>
                                <li><router-link v-if="!user.auth" to="/register">注册</router-link></li>
                                <li><router-link v-if="!user.auth" to="/login">登录</router-link></li>
                                <li><router-link v-if="!user.auth" to="/login1">登录1</router-link></li>
                                <li><router-link v-if="user.auth"  to="/login1">个人中心</router-link></li>
                                <li><router-link v-if="user.auth"  to="/login1">退出</router-link></li>
                            </ul>
                        </div>
</template>
<script>
        import {mapState} from 'vuex'
        export default {
              computed :{
                ...mapState({
                    user:state => state.AuthUser
                })
              }
        }
</script>
