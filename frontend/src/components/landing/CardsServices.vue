<script setup lang="ts">
import CardServices from "../shared/UI/card/CardServices.vue";
import type {Services} from "@/utilities/types.ts";

interface iProps {
  servicesList: Services[]
}

defineProps<iProps>()
</script>

<template>
<section class="cards-services">
  <h2 class="cards-services__title">Услуги</h2>

  <div class="cards-services__content">
    <div class="cards-services__item" v-for="service of servicesList" :key="service.id">
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
  width: 100%;

  &__content {
    display: flex;
    align-items: center;
    column-gap: 20px;
    width: 100%;
  }

  &__item {
    align-self: stretch;
    width: 100%;
  }
}
</style>
