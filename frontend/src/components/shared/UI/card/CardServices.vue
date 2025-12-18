<script setup lang="ts">
import ButtonLink from '../button/ButtonLink.vue';
import type {Services} from "@/utilities/types.ts";

interface iProps {
  service: Services;
}

defineProps<iProps>()
</script>
<template>
  <article class="card-services">
    <div class="card-services__header">
      <div class="card-services__text-block">
        <h3 class="card-services__title">{{ service.name }}</h3>
        <p class="card-services__summary"> от {{ service.price }} &#8381</p>
      </div>
      <div>
        <button-link />
      </div>
    </div>
    <p class="card-services__content">{{ service.description }}</p>
  </article>
</template>


<style scoped lang="scss">
.card-services {
  height: 100%;
  @extend .base-block;
  display: flex;
  flex-direction: column;
  padding: 40px 20px;
  gap: 24px;
  align-items: flex-start;
  max-width: 494px;
  width: 100%;
  justify-content: flex-start;

  &__header{
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
  }
  &__summary{
    font-family: $font-primary;
    font-weight: $font-weight-regular;
    font-size: 1.2rem;
  }
  &__text-block{
    display: flex;
    align-items: start;
    justify-content: center;
    flex-direction: column;
    gap: 8px;
  }
  &__title{
    font-size: 1.2rem;
    font-family: $font-primary;
    font-weight: $font-weight-regular;
    color: $color-gray;
  }
  &__content{
    font-family: $font-primary;
    font-weight: $font-weight-regular;
    font-size: 1.2rem;
    max-width: 80%;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
  }
}
</style>
