<template>
  <div class="container">
    <div class="row row-cols-2">
      <div class="col" v-for="post in posts" :key="post.slug">
        <div class="card mb-4">
          <!-- <img v-if="post.cover_img" :src="post.cover_img" class="card-img-top">
        <img v-else src="/images/image-placeholder.jpeg" class="card-img-top"> -->
          <img
            :src="getImageSrc(post)"
            @error="getImage"
            class="card-img-top"
          />

          <div class="card-body">
            <h5 class="card-title">{{ post.title }}</h5>
            <p class="card-text" v-html="post.text"></p>
            <router-link :to="{ name: 'posts.show', params: { slug: post.slug } }" class="btn btn-primary">Vedi post
            </router-link>
          </div>
        </div>

        
      </div>
    </div>
    <Pagination :current-page="paginationData.current_page" :next-page="paginationData.current_page + 1"
      :total-pages="paginationData.last_page" @changePage="onChangePage"></Pagination>
  </div>
</template>

<script>
import axios from "axios";
import Pagination from "./Pagination.vue"
export default {
  components:{Pagination},
  data() {
    return {
      posts: [],
      paginationData: {},
    };
  },
  methods: {
    fetchData(newPage = 1) {
      axios.get("/api/posts?page=" + newPage).then((resp) => {
        this.posts = resp.data.data;
        this.paginationData = resp.data;
      });
    },
    getImageSrc(post) {
      if (!post.image) {
        return "/images/image_placeholder.jpg";
      }
      return post.image;
    },
    getImage(event) {
      event.target.src = "/images/image_placeholder.jpg";
    },
    onChangePage(newPage) {
      this.fetchData(newPage);
    }
  },
  mounted() {
    this.fetchData();
  },
};
</script>