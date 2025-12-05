<script setup lang="ts">
import NavigationLink from "@/components/UI/NavigationLink.vue";
import {navLinkList} from "@/utilities/navLink.ts";
import Button from "@/components/UI/Button.vue";
</script>

<template>
  <header class="header">
    <a href="#"><h1>Крематорий</h1></a>

    <nav class="header__navigation">
      <p v-for="link of navLinkList" :key="link.text">
        <navigation-link :link="link.text" :href="link.link">{{ link.text }}</navigation-link>
      </p>
    </nav>

    <Button>войти</Button>
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
