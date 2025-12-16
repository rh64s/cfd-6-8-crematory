<script setup lang="ts">
import AppHeader from "@/components/shared/app/AppHeader.vue";
import AppFooter from "@/components/shared/app/AppFooter.vue";
</script>

<template>
  <div class="wrapper">
    <app-header />

    <router-view></router-view>
  </div>

  <app-footer />
</template>

<style lang="scss">
html {
  scroll-behavior: smooth;
}

.wrapper {
  max-width: 1540px;
  width: 100%;
  padding: 0 10px;
  margin: 50px auto 0;
  display: flex;
  flex-direction: column;
  align-items: center;
  row-gap: 100px;
}

h2 {
  font-size: 2.4rem;
  font-weight: $font-weight-light;
}
</style>
