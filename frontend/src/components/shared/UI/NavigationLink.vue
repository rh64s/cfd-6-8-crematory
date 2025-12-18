<script setup lang="ts">
defineProps({
  href: String
})
</script>

<template>
  <router-link :to="`/${href}`" class="navigation-link">
    <slot class="navigation"></slot>
  </router-link>
</template>

<style scoped lang="scss">
.navigation-link{
  font-size: 18px;
  text-decoration: none;
  color: $color-black;
  font-family: "Inter", sans-serif;
  font-weight: 300;
}
.navigation-link:hover{
  color: #2B2B2B;
}
.navigation-link:active{
  color: #2B2B2B;
}
</style>
