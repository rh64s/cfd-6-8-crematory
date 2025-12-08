<script setup lang="ts">

</script>

<template>
  <section class="support-message">
    <p class="support-message__content">В этот трудный момент мы готовы поддержать вас — с
      уважением, заботой и вниманием к <span
        class="support-message__content--underline">каждой</span> детали.</p>
  </section>
</template>

<style scoped lang="scss">
.support-message {
  @extend .base-block;
  padding: 40px;
  width: 100%;

  &__content {
    font-size: 1.5rem;
    color: $color-black;
    font-weight: $font-weight-light;
    font-style: $font-style-light;
    max-width: 1065px;
    text-align: center;

    &--underline {
      text-decoration-line: underline;
      text-decoration-style: wavy;
      text-decoration-color: $color-gray;
      text-underline-offset: 4px;
      text-decoration-thickness: 3px;
    }
  }
}
</style>
