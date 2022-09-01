<template>
    <div>
    <h1>Pagina Show POST # {{ post?.id }}</h1>

    <h2>{{ post?.title }}</h2>
    

    <img :src="post?.image" alt="" style="width: 300px">
    <p v-html="post?.text"></p>

    <!-- <div v-if="post?.category">
      <h4>Categoria</h4>
      {{ post.category.name }}</div>
    <div v-if="post.tag.length > 0">
      <h4>Tags</h4>
      <ul>
        <li v-for="tag in post.tag" :key="tag.id">{{ tag.name }}</li>
      </ul>
    </div> -->
  </div>
</template>

<script>
import axios from "axios";
export default {
    data(){
        return{
            post: {}
        }
    },
    mounted(){
   
        axios.get("/api/posts/" + this.$route.params.slug)
            .then((resp) => {
console.log(resp.data)
                const data = resp.data;
                this.post = data;
            })
    }
}
</script>