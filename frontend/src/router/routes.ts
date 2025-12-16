import AppHome from "@/pages/AppHome.vue";
import AppRegistration from "@/pages/AppRegistration.vue";

const routes = [
  { path: '/', name: "AppHome", component: AppHome },
  { path: '/register', name: "AppRegistration", component: AppRegistration },
];

export default routes;
