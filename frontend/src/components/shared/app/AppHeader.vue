<script setup lang="ts">
import NavigationLink from "@/components/shared/UI/NavigationLink.vue";
import {navLinkList} from "@/utilities/navLink.ts";
import TheButton from "@/components/shared/UI/button/TheButton.vue";
</script>

<template>
  <header class="header">
    <router-link to="/"><h1>Крематорий</h1></router-link>

    <nav class="header__navigation">
      <p v-for="link of navLinkList" :key="link.text">
        <navigation-link :href="`/${link.link}`">{{ link.text }}</navigation-link>
      </p>
    </nav>

    <TheButton>войти</TheButton>
  </header>
</template>

<style scoped lang="scss">
h1 {
  font-size: 1.5rem;
  color: $color-gray;
  font-weight: $font-weight-bold;
}

.header {
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;

  &__navigation {
    display: flex;
    align-items: center;
    column-gap: 40px;
  }
}
</style>
