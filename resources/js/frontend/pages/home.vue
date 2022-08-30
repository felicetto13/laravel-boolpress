<template>
    <div>
        <h2>Lista dei post</h2>
        <PostView></PostView>
    </div>
</template>

<script>
import PostView from '../components/PostView.vue';

export default {
    components:{PostView}
}
</script>