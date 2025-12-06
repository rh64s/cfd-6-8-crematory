<script setup lang="ts">

import {questions} from "@/utilities/qustionAccordion.ts";
import FaqAccordion from "@/components/shared/UI/FaqAccordion.vue";
</script>

<template>
<section class="questions">
  <h2 class="questions__title">Часто задаваемые вопросы</h2>

  <div class="questions__list">
    <article class="questions__item" v-for="question of questions" :key="question.id">
      <faq-accordion
        :question="question"
      />
    </article>
  </div>
</section>
</template>

<style scoped lang="scss">
.questions {
  display: flex;
  flex-direction: column;
  align-items: center;
  row-gap: 40px;

  &__list {
    display: flex;
    flex-wrap: wrap;
    column-gap: 18px;
  }

  &__item {
    width: 100%;
    max-width: 750px;
  }
}
</style>
