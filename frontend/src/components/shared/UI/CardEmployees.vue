<script setup lang="ts">
import type {Employees} from "@/utilities/types.ts";

interface iProps {
  employee: Employees;
}

defineProps<iProps>()
const getImageUrl = (name: string) => {
  return new URL(`../../../assets/image/employees/${name}`, import.meta.url).href
}
</script>

<template>
<article class="employee-card">
  <div class="employee-card__header">
    <img :src="getImageUrl(employee.avatarLink)" alt="аватарка" />

    <h3 class="employee-card__fullName">{{ employee.fullName }}</h3>
  </div>

  <div class="employee-card__info">
    <p class="employee-card__position">{{ employee.position }}</p>
    <p>{{ employee.task }}</p>
  </div>
</article>
</template>

<style scoped lang="scss">
.employee-card {
  @extend .base-block;
  padding: 20px;
  flex-direction: column;
  row-gap: 20px;
  text-align: start;
  max-width: 366px;
  height: 100%;

  &__header {
    display: flex;
    flex-direction: column;
    row-gap: 20px;
  }

  &__fullName {
    font-size: 1.5rem;
    font-weight: $font-weight-medium;
  }

  &__info {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    row-gap: 20px;
    height: 100%;
  }

  &__position {
    font-size: 1.25rem;
    color: $color-gray;
  }
}
</style>
