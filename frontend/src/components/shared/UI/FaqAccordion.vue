<script setup lang="ts">
import type { Question } from "@/utilities/types.ts";
import { ref } from "vue";

interface iProps {
  question: Question
}

const props = defineProps<iProps>()

const isOpen = ref<boolean>(props.question.isOpen)

const toggleOpen = () => {
  isOpen.value = !isOpen.value
}
</script>

<template>
  <div class="accordion">
    <div @click="toggleOpen" class="accordion__header" :class="{ 'is-open': isOpen }">
      <h3 class="accordion__title">{{ question.title }}</h3>
      <div class="accordion__arrows">
        <div class="accordion__arrow--first"></div>
        <div class="accordion__arrow--second"></div>
      </div>
    </div>
    <div
      class="accordion__content"
      :style="{maxHeight: isOpen ? '150px' : '0px' }"
      v-html="question.text"
    ></div>
  </div>
</template>

<style scoped lang="scss">
.accordion {
  display: flex;
  flex-direction: column;

  &__arrows {
    position: relative;
    cursor: pointer;
    width: 25px;
    height: 14px;
  }

  &__arrow--first {
    position: absolute;
    background-color: transparent;
    top: 8px;
    left: 0;
    width: 13px;
    height: 10px;
    display: block;
    transform: rotate(30deg);
    float: right;
    border-radius: 2px;
    transition: transform 0.3s ease;
  }

  &__arrow--first::after {
    content: "";
    background-color: $color-gray;
    width: 30px;
    height: 7px;
    display: block;
    float: right;
    border-radius: 10px;
    transition: 0.3s;
    z-index: -1;
  }

  &__arrow--second {
    position: absolute;
    background-color: transparent;
    top: -0.5px;
    left: 22.5px;
    width: 13px;
    height: 10px;
    display: block;
    transform: rotate(-30deg);
    float: right;
    border-radius: 2px;
    transition: transform 0.3s ease;
  }

  &__arrow--second::after {
    content: "";
    background-color: $color-gray;
    width: 30px;
    height: 7px;
    display: block;
    float: right;
    border-radius: 10px;
    transition: all 0.3s;
    z-index: -1;
  }

  &__header:not(.is-open):hover .accordion__arrow--first::after,
  &__header.is-open .accordion__arrow--first::after {
    transform: rotate(-60deg);
  }

  &__header:not(.is-open):hover .accordion__arrow--second::after,
  &__header.is-open .accordion__arrow--second::after {
    transform: rotate(60deg);
  }

  &__header {
    @extend .base-block;
    justify-content: space-between;
    padding: 20px 52px;
    cursor: pointer;
  }

  &__title {
    font-family: "Inter", sans-serif;
    font-weight: normal;
    font-size: 1.25rem;
  }

  &__content {
    max-height: 0;
    font-family: "Inter", sans-serif;
    font-size: 1.25rem;
    overflow: hidden;
    margin: 20px 50px;
    transition: max-height 0.3s ease;
  }
}
</style>
