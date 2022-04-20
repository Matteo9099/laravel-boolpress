<template>
  <div>
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">{{ title }}, {{ category?category.name:'&nbsp'}}</h2>
            <img class="img-fluid" :src='img' alt='title'>
            <p class="card-text">{{ troncateText(content) }}</p>
            <router-link class="btn btn-primary" :to="{ name: 'single-post', params: { slug: slug } }">Vedi articolo completo</router-link>
        </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Post",
  props:[ 'img','title', 'content', 'slug', 'category', 'tags' ],
  data() {
    return {
      strTroncateLen: 30
    }
  },

  methods: {
    troncateText(text) {
      if ((text.length > this.strTroncateLen)) {
        return text.substring(0, this.strTroncateLen) + '...';
      } else {
        return text;
      };
    }
  }
};
</script>

<style>
    
  
</style>
