<template>
  <nav>
    <div class="container border-bottom py-3 d-flex justify-content-between">
      <h2>Boolpress</h2>
      <ul class="list-unstyled d-flex gap-3 ">
        <li class="nav-item">
            <router-link class="nav-link" to="/">Home</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" :to="{ name: 'contacts' }">Contatti</router-link>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/posts">Post admin</a>
          </li>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  data() {
    return {};
  },
};
</script>