import { createRouter, createWebHistory } from 'vue-router'
import AppHome from "@/pages/AppHome.vue";
import AppRegistration from "@/pages/AppRegistration.vue";
import AppLogin from "@/pages/AppLogin.vue";

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
    {
      path: '/login',
      name: 'login',
      component: AppLogin,
    },
  ],
})

export default router
