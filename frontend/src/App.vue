<script setup lang="ts">

import AppHeader from "@/components/shared/AppHeader.vue";
import AppHome from "@/components/shared/AppHome.vue";
</script>

<template>
  <div class="wrapper">
    <app-header />

    <app-home />
  </div>
</template>

<style lang="scss">
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
</style>
