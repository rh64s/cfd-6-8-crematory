<script setup lang="ts">

import { servicesList } from "@/utilities/servicesCard.ts";
import CardServices from "../shared/UI/CardServices.vue";
</script>

<template>
<section class="cards-services">
  <h2 class="cards-services__title">Услуги</h2>

  <div class="cards-services__content">
    <div class="card-services__item" v-for="service of servicesList" :key="service.id">
      <card-services
          :service="service"
      />
    </div>
  </div>
</section>
</template>

<style scoped lang="scss">
.cards-services {
  display: flex;
  flex-direction: column;
  align-items: center;
  row-gap: 40px;

  &__content {
    display: flex;
    align-items: center;
    column-gap: 20px;
  }
}
</style>
