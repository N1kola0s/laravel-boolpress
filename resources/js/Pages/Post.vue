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
      }
    },
    mounted(){
        axios.get('/api/posts/' + this.$route.params.id)
        .then(response =>{
            this.post = response.data
            
        })
        .catch(e => {
            console.error(e);
        })
    }
  }
</script>

<style lang="scss" scoped>

</style>

