<template>
  <div>
    <Navbar></Navbar>

    <div class="container">

      <h1>Questa è la home guest o pubblica del sito dove non serve l'accesso</h1>
      
    </div>
    <div class="container">
      <router-view></router-view>
    </div>

  </div>
</template>

<script>
import Navbar from './frontend/components/Navbar.vue';
export default {
  components: { Navbar  },
  data() {
    return {
    };
  }
}
</script>