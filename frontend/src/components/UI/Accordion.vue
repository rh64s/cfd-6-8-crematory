<script setup lang="ts">
//import { watch } from "vue";
import type { Question} from "@/utilities/types.ts";
//import { questions } from "@/utilities/qustionAccordion.ts";

interface IProps {
  Question: Question;
}

const props = defineProps<IProps>();


</script>
<template>
  <div class="accordion">
    <div @click="() => {Question.check = !Question.check}" class="accordion_header">
      <h3 class="accordion_title">{{Question.title}}</h3>
      <div class="accordion_arrow">
        <div class="accordion_arrow1"></div>
        <div class="accordion_arrow2"></div>
      </div>
    </div>
    <div class="accordion_content" v-html="Question.text"></div>
  </div>
</template>
<style scoped lang="scss">

.accordion{

  &_arrow{
    position: relative;
    cursor: pointer;
    width: 25px;
    height: 14px;
  }

  &_arrow1{
    position: absolute;
    background-color: transparent;
    top: 10px;
    left: 0;
    width: 13px;
    height: 10px;
    display: block;
    transform: rotate(35deg);
    float: right;
    border-radius: 2px;
  }

  &_arrow1::after{
    content: "";
    background-color: $color-gray;
    width: 40px;
    height: 10px;
    display: block;
    float: right;
    border-radius: 10px 10px 10px 10px;
    transition: all 0.3s ;
    z-index: -1;
  }

  &_arrow2{
    position: absolute;
    background-color: transparent;
    top: -5px;
    left: 27px;
    width: 13px;
    height: 10px;
    display: block;
    transform: rotate(-35deg);
    float: right;
    border-radius: 2px;
  }


  &_arrow2::after {
    content: "";
    background-color: $color-gray;
    width: 40px;
    height: 10px;
    display: block;
    float: right;
    border-radius: 10px 10px 10px 10px;
    transition: all 0.3s;
    z-index: -1;
  }


  &_header:hover .accordion_arrow1::after{
    transform-origin: center center;
    transform: rotate(-70deg);
  }
  &_header:hover .accordion_arrow2::after{
    transform-origin: center center;
    transform: rotate(70deg);
  }

  &_header{
    @extend .base-block;
    justify-content: space-between;
    padding: 10px 52px;
    cursor: pointer;
  }

  &_title{
    font-family: "Inter", sans-serif;
    font-weight: normal;
    font-size: 1.2rem;
  }

  &_content{
    height: 0;
    font-family: "Inter", sans-serif;
    font-size: 1.2rem;
    transition: all 0.4s;
    overflow: hidden;
  }
}
</style>
