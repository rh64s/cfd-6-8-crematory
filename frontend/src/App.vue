<script setup lang="ts">

import AppHeader from "@/components/shared/AppHeader.vue";
import SupportMessage from "@/components/shared/SupportMessage.vue";
</script>

<template>
  <app-header />

  <support-message />
</template>

<style lang="scss">
#app {
  margin-top: 50px;
  display: flex;
  flex-direction: column;
  align-items: center;
  row-gap: 100px;
}
</style>
