<script setup lang="ts">

</script>
<template>
  <a class="navigation-link" href="/frontend/public">
    <slot class="navigation"></slot>
  </a>
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
