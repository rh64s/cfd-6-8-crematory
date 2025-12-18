<script setup lang="ts">

</script>

<template>
  <article class="urn-ashes-card">
    <div class="urn-ashes-card__image"></div>
    <div class="urn-ashes-card__button"></div>

    <div class="urn-ashes-card__info">
      <div class="urn-ashes-card__name"></div>
      <div class="urn-ashes-card__price-range"></div>
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

    &::first-letter {
      text-transform: uppercase;
    }
  }

  &__price-range {
    font-size: 0.9rem;
    color: $color-gray;
  }
}
</style>
