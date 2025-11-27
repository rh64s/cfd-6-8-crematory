<script setup lang="ts">
import { navLinkList} from "@/utilities/navLink.ts";
import  NavigationLink  from "@/components/UI/NavigationLink.vue";
import Button from "@/components/UI/Button.vue";
import ButtonLink from "@/components/UI/ButtonLink.vue";
import Accordion from "@/components/UI/Accordion.vue";
import {questions} from "@/utilities/qustionAccordion.ts";
//import type { Question } from "@/utilities/types.ts";

const links = navLinkList

</script>
<template>

  <nav class="navigation">
    <p v-for="link in links" :key="link.text" >
      <NavigationLink :link="link.text" :href="link.link">{{link.text}}</NavigationLink>
    </p>
    <Button>clon</Button>
    <div>
      <button-link></button-link>
    </div>
  </nav>
  <div class="questions-list">
    <div  v-for="question in questions" :key="question.id" class="questions__item" >
      <accordion
        :question="question"
      />
    </div>
  </div>

</template>
<style lang="scss">
.questions-list {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.questions__item {
  width: 100%;
  max-width: 750px;
}

.navigation{
  display: flex;
  justify-content: space-between;
}
</style>
