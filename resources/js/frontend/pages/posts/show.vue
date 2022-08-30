<template>
    <div>
    <h1>Pagina Show POST # {{ post.id }}</h1>

    <h2>{{ post.title }}</h2>
    <h3>Post di <strong>{{ post.user.name }}</strong></h3>

    <img :src="post.cover_img" alt="" style="width: 300px">
    <p v-html="post.content"></p>

    <div v-if="post.category">
      <h4>Categoria</h4>
      {{ post.category.name }}</div>
    <div v-if="post.tags.length > 0">
      <h4>Tags</h4>
      <ul>
        <li v-for="tag in post.tags" :key="tag.id">{{ tag.name }}</li>
      </ul>
    </div>
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
        axios.get("api/posts"+ this.$route.params.value)
            .then((resp) => {
                const data = resp.data
                this.post = data;
            })
    }
}
</script>