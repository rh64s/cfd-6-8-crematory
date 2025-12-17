import { createRouter, createWebHistory } from 'vue-router'
import AppHome from "@/pages/AppHome.vue";
import AppRegistration from "@/pages/AppRegistration.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: AppHome,
    },
    {
      path: '/register',
      name: 'registration',
      component: AppRegistration,
    },
  ],
})

export default router
