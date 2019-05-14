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
    
    export default {
       components:{
             TopMenu
       }
    }
</script>
