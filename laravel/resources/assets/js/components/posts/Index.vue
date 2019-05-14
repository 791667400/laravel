<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">INDEX 文章列表</div>
                
                    <div v-for="post in posts" :key="post.id" class="panel-body">
                       <h4>
                       <router-link :to="{name:'posts_name',params:{id:post.id}}">
                       a-{{post.title}}-a
                       </router-link>
                       </h4>
					   <p>{{post.body}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            //console.log('h1');
            axios.get('/api/posts').then(response=>{
				//console.log('h4');
				//console.log(response.data);
				this.posts=response.data.data;
            })
        },
        data(){
            return {
                posts:[]
            }
        }
    }
</script>
