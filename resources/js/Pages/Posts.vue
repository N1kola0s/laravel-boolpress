<template>
  <div>
    <banner-component></banner-component>

    <div class="container-fluid">

      <div class="row">

        <main class="col-12 col-md-9">


          <section class="posts py-5">
            <div class="container">
              <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 my-5">
                <div class="col" v-for="post in postsResponse.data" :key="post.id">
                  <div class="product card">
                    <img :src="'storage/' + post.cover" :alt="post.title" />

                    <div class="card-body">
                      <h3>{{ post.title }}</h3>
                      <p>{{trimText(post.content)}}</p>
                    </div>
                    <!-- .card-body -->

                    <div class="card-footer">
                      <div class="col">
                        <span>
                          <strong> Author: </strong>

                          Io me e me stesso
                        </span>
                      </div>
                      <!-- .col -->

                      <div class="col">
                        <span v-if="post.category">
                          <strong> Category: </strong>

                          {{ post.category.name }}
                        </span>

                        <div class="tags" v-if="post.tags.length > 0">
                          <strong> Tags: </strong>

                          <span v-for="tag in post.tags" :key="tag.id">
                            <a href="#">{{ tag.name }}</a> -
                          </span>
                        </div>
                        <!-- /.tags -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.card-footer -->
                  </div>
                  <!-- /.product  -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <nav aria-label="Page navigation" class="py-5">
                <ul class="pagination justify-content-center">
                  <li class="page-item" v-if="postsResponse.current_page > 1">
                    <a
                      class="page-link"
                      href="#"
                      aria-label="Previous"
                      @click.prevent="getAllPosts(postsResponse.current_page - 1)"
                    >
                      <span aria-hidden="true">&laquo;</span>
                      <span>Previous</span>
                    </a>
                  </li>
                  <li :class="{'page-item' : true, 'active':page==postsResponse.current_page}" v-for="page in postsResponse.last_page" :key="page.id">
                    <a class="page-link" href="#" @click.prevent="getAllPosts(page)">{{ page }}</a>
                  </li>

                  <li
                    class="page-item"
                    v-if="postsResponse.current_page < postsResponse.last_page"
                  >
                    <a
                      class="page-link"
                      href="#"
                      aria-label="Next"
                      @click.prevent="getAllPosts(postsResponse.current_page + 1)"
                    >
                      <span aria-hidden="true">&raquo;</span>
                      <span>Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
              <!-- /nav -->
            </div>
            <!-- /.container -->
          </section>
          <!-- /.posts -->

        </main>
        <!-- /main -->


        <aside class="bg-white p-2 col-12- col-md-3 my-5">
          <div class="categories">
            <h4>Categorie:</h4>
            <ul> 
              <li v-for="category in categories" :key="category.id">
                {{category.name}}
              </li>
            </ul>
          </div>
          <!-- /.categories -->

          <div class="tags">
            <h4>Tags:</h4>
            <ul> 
              <li v-for="tag in tags" :key="tag.id">
                {{tag.name}}
              </li>
            </ul>
          </div>
          <!-- /.categories -->
        </aside>
        <!-- /aside -->

      </div>
      <!-- /.row -->

    </div>

  </div>
</template>

<script>
  import BannerComponent from '../components/BannerComponent';
  export default {
    name: "Posts",
    components: {
      BannerComponent,
    },
    data() {
      return {
        postsResponse: "",
        categories:'',
        tags:''
      };
    },
    methods: {
      getAllPosts(postPage) {
        axios
          .get("/api/posts", {
            params: {
              page: postPage,
            }
          })
          .then((response) => {
            /* console.log(response.data.data); */
            /* this.posts = response.data.data; */
            this.postsResponse = response.data;
          })
          .catch((e) => {
            console.error(e);
          });
      },
      getAllCategories(){
        axios
        .get('/api/categories')
        .then(response =>{
          /* console.log(response); */
          this.categories=response.data;
        })
        .catch(e =>{
          console.error(e);
        })
      },
      getAllTags(){
        axios
        .get('/api/tags')
        .then(response =>{
          /* console.log(response); */
          this.tags=response.data;
        })
        .catch(e =>{
          console.error(e);
        })
      },
      trimText(text){
        if(text.length > 1){
          return text.slice(0, 1) + '...'
        }
        return text;
      }
    },
    mounted() {
      /* console.log('mounted'); */
      this.getAllPosts(1);
      this.getAllCategories();
      this.getAllTags();
    },
  };
</script>

