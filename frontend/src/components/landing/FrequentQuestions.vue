<script setup lang="ts">

import {questions} from "@/utilities/questionsAccordion.ts";
import FaqAccordion from "@/components/shared/UI/FaqAccordion.vue";
import {ref} from "vue";

const questionsColumnFirst = ref()
const questionsColumnLast = ref()

questionsColumnFirst.value = questions.filter((item, index) => {
  return index % 2 === 0
})
questionsColumnLast.value = questions.filter((item, index) => {
  return index % 2 === 1
})
</script>

<template>
<section class="questions">
  <h2 class="questions__title">Часто задаваемые вопросы</h2>

  <div class="questions__list">
    <div class="questions__list--first">
      <div class="questions__item" v-for="question of questionsColumnFirst" :key="question.id">
        <faq-accordion :question="question" />
      </div>
    </div>

    <div class="questions__list--last">
      <div class="questions__item" v-for="question of questionsColumnLast" :key="question.id">
        <faq-accordion :question="question" />
      </div>
    </div>
  </div>
</section>
</template>

<style scoped lang="scss">
.questions {
  display: flex;
  flex-direction: column;
  align-items: center;
  row-gap: 40px;
  width: 100%;

  &__list {
    display: flex;
    justify-content: space-between;
    column-gap: 18px;
    width: 100%;

    &--first, &--last {
      display: flex;
      flex-direction: column;
      width: 100%;
    }
  }

  &__item {
    width: 100%;
    max-width: 750px;
  }
}
</style>
