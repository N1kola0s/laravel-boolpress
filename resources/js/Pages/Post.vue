<template>
    <div>
        <div class="container my-4">

            <h1 class="post_title text-center mb-4">{{post.title}}</h1>

            <div class="post_image d-flex justify-content-center">
                <img class="mb-4" width="600" :src="'/storage/' + post.cover" :alt="post.title">
            </div>

            <p class="post_text mb-4">{{post.content}}</p>
            

        </div>
        <!-- /.container -->
    </div>
   
</template>

<script>
import axios from 'axios';
export default {
    name:'Post',
    data(){
      return{
        post:'',
        loading:true
      }
    },
    mounted(){
        axios.get('/api/posts/' + this.$route.params.id)
        .then(response =>{
            if (response.data.status_code === 404){
                console.log('404 page not found');
                this.$router.push({name:'not-found'})
                this.loading=false
            }else {
                console.log('page found');
                this.post=response.data
                this.loading=false
            }
            
        })
        .catch(e => {
            console.error(e);
        })
    }
  }
</script>

<style lang="scss" scoped>

</style>

