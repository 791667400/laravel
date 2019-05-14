<template>
    <div class="container">
        <br>---post组件引入----<br> 
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>{{post.title}}</h1></div>
                    <div  class="panel-body">
                    {{post.body}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('/api/posts/'+this.$route.params.id);
            axios.get('/api/posts/'+this.$route.params.id).then(response=>{
				this.post=response.data;
            })
        },
        data(){
            return {
                post:[]
            }
        }
    }
</script>
