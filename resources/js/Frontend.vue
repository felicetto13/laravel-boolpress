<template>
  <div>
    <Navbar></Navbar>

    <div class="container">

      <h1>Questa è la home guest o pubblica del sito dove non serve l'accesso</h1>

      <h2>Lista post</h2>

      <PostView></PostView>
    </div>
  </div>
</template>

<script>
import Navbar from './frontend/components/Navbar.vue';
import PostView from './frontend/components/PostView.vue';
export default {
  components: { Navbar ,PostView },
  data() {
    return {
    };
  }
}
</script>