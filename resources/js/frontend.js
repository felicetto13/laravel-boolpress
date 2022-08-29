import Vue from "vue";
// @ts-ignore
import Frontend from "./Frontend.vue";

new Vue({
  el: "#app",
  render: h => h(Frontend)
})
