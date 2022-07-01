<template>
<div class="page">

    <div class="not_found_page_jumbo p-5 bg-dark text-white">
        <div class="container">

            <h1 class="not_found_page_title display-2"> 
                Ops! Page not found, 404
            </h1>
            <!-- not_found_page_title -->

            <p class="not_found_page_text">
                Siamo spiacenti la pagina richiesta non esiste
            </p>
            <!-- /.not_found_page_text -->
        </div>
        <!-- /.container -->
    </div>
    <!-- not_found_page_jumbo -->

    <div class="not_found_page_menu container py-5">

        Prova a visitare una delle seguenti pagine:
        
        <ul>
            <li>
                <router-link :to="{name:'home'}">HomePage</router-link>
            </li>
            <li>
                <router-link :to="{name:'about'}">About</router-link>
            </li>
            <li>
                <router-link :to="{name:'posts'}">Posts</router-link>
            </li>
        </ul>

    </div>
    <!-- /.not_found_page_menu -->




</div>


    
</template>

<script>

export default ({   
    name:''
    
})
</script>

<style lang="scss" scoped>
    

</style>
