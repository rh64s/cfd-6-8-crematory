<script setup lang="ts">

</script>

<template>
<section class="support-message">
  <div class="support-message__inner">
    <p class="support-message__content">В этот трудный момент мы готовы поддержать вас — с уважением, заботой и вниманием к <span class="support-message__content--underline">каждой</span> детали.</p>
  </div>
</section>
</template>

<style scoped lang="scss">
.support-message {
  width: 100%;

  &__inner {
    margin: 0 auto;
    max-width: 1540px;
    width: 100%;
    @extend .base-block;
    padding: 40px;
  }

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
    }
  }
}
</style>
