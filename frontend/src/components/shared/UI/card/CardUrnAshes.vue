<script setup lang="ts">
import type {Urn} from "@/utilities/types.ts";
import ButtonLink from "@/components/shared/UI/button/ButtonLink.vue";

interface iProps {
  urn: Urn;
}

defineProps<iProps>()
const getImageUrl = (name: string) => {
  return new URL(`../../../../assets/image/urnsAshes/${name}`, import.meta.url).href
}
</script>

<template>
  <article class="urn-ashes-card">
    <img :src="getImageUrl(urn.imageLink)" alt="урна для праха" class="urn-ashes-card__image" />
    <button-link class="urn-ashes-card__button" />

    <div class="urn-ashes-card__info">
      <h3 class="urn-ashes-card__name">{{ urn.name }}</h3>
      <p class="urn-ashes-card__price-range">{{ urn.priceRange }}</p>
    </div>
  </article>
</template>

<style scoped lang="scss">
.urn-ashes-card {
  @extend .base-block;
  position: relative;
  border-radius: 33px;
  flex-direction: column;
  row-gap: 20px;
  padding-bottom: 20px;

  &__image {
    border-radius: 33px;
  }

  &__button {
    position: absolute;
    top: 20px;
    right: 20px;
  }

  &__info {
    text-align: center;
    display: flex;
    flex-direction: column;
    row-gap: 8px;
  }

  &__name {
    font-size: 1.25rem;
    font-weight: $font-weight-regular;
  }

  &__price-range {
    font-size: 0.9rem;
    color: $color-gray;
  }
}
</style>
