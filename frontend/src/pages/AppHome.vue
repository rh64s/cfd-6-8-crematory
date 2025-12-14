<script setup lang="ts">
import SupportMessage from "@/components/landing/SupportMessage.vue";
import AboutUs from "@/components/landing/AboutUs.vue";
import CardServices from "@/components/landing/CardServices.vue";
import NotAlone from "@/components/landing/NotAlone.vue";
import FrequentQuestions from "@/components/landing/FrequentQuestions.vue";
import OurEmployees from "@/components/landing/OurEmployees.vue";
import UrnsAshes from "@/components/landing/UrnsAshes.vue";
</script>

<template>
  <support-message />
  <about-us id="about" />
  <card-services id="services" />
  <urns-ashes />
  <not-alone id="intimate" />
  <our-employees id="employees" />
  <frequent-questions id="questions" />
</template>

<style scoped lang="scss">

</style>
