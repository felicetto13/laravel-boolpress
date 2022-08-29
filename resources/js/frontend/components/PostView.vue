<template>
  <div class="container">
    <div class="row row-cols-2">
      <div class="col" v-for="post in posts" :key="post.id">
        <div class="card mb-4">
          <!-- <img v-if="post.cover_img" :src="post.cover_img" class="card-img-top">
        <img v-else src="/images/image-placeholder.jpeg" class="card-img-top"> -->
          <img :src="getImageSrc(post)" class="card-img-top" />

          <div class="card-body">
            <h5 class="card-title">{{ post.title }}</h5>
            <p class="card-text" v-html="post.text"></p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>

        <!-- <Post :post="post"></Post> -->
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      posts: [],
    };
  },
  
  methods: {
    fetchData() {
      axios.get("api/posts");
      then((resp) => {
        this.posts = resp.data;
      });
    },
    getImageSrc(post) {
      if (!post.image) {
        return "/images/image-placeholder.jpeg";
      }
      return post.image;
    }
  },
  mounted(){
      this.fetchData();
  },
};
</script>