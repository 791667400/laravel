<template>
    <div class="container">框架
            <br>---导航栏----<br>
        <top-menu></top-menu>
            <br>---内容----<br>
        <router-view></router-view>
    </div>
</template>
<script>
    import TopMenu from './common/TopMenu'
    import JwtToken from '../helps/jwt'
    export default {
        created(){
            if(JwtToken.getToken()){
                this.$store.dispatch("setAuthUser")
            }
        },
       components:{
             TopMenu
       }
    }
</script>
