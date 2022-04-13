<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div v-if="post">
                    <h1>{{post.title}}</h1>
                    <h3 v-if="post.category">Categoria: {{post.category.name}}</h3>
                    <p>{{post.content}}</p>
                    <p>Tags:</p>
                    <ul>
                        <li v-for="tag in post.tags" :key="tag.id">
                            {{tag.name}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
   export default {
       name: 'SinglePost',

       data() {
           return {
               post: null
           }
       },

       // richiesta axios api laravel che ritorni le info per un post specifico identificato dal suo slug
        mounted() {

            const slug = this.$route.params.slug;

            axios.get('/api/posts/' + slug).then(res => {
                if(res.data.success == false) {
                    this.router.push({name: 'not-found'});
                } else {
                    this.post = res.data.results;
                }
            });
        },
   }
</script>

<style>
    
</style>