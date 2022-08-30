import VueRouter from "vue-router"
import Home from "./frontend/pages/home.vue"
import Contacts from "./frontend/pages/contacts.vue"
import PostShow from "./frontend/pages/posts/show.vue"

export const routes = [
  { path: "/", component: Home, name: "home" },
  { path: "/contatti", component: Contacts, name: "contacts" },
  { path: "/posts/:slug", component: PostShow, name: "posts.show" },
]