import { createRouter, createWebHistory } from 'vue-router'
import AppHome from "@/pages/AppHome.vue";
import AppRegistration from "@/pages/AppRegistration.vue";
import AppLogin from "@/pages/AppLogin.vue";
import UserProfile from "@/pages/UserProfile.vue";

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
    {
      path: '/profile',
      name: 'profile',
      component: UserProfile,
    }
  ],
  scrollBehavior(to, from, savedPosition) {
    if (to.hash) {
      return new Promise((resolve) => {
        setTimeout(() => {
          const element = document.getElementById(to.hash.slice(1))
          if (element) {
            resolve({
              el: element,
              behavior: 'smooth'
            })
          } else {
            resolve({ top: 0 })
          }
        }, 100)
      })
    }

    return { top: 0 }
  }
})

export default router
