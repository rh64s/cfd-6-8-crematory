<script setup lang="ts">
import CardServices from "../shared/UI/card/CardServices.vue";
import type {Services} from "@/utilities/types.ts";
import SkeletonCardService from "@/components/shared/UI/skeleton/SkeletonCardService.vue";

interface iProps {
  servicesList: Services[]
}

defineProps<iProps>()

const isEmpty = (obj: object): boolean => {
  return Object.keys(obj).length === 0;
}
</script>

<template>
<section class="cards-services">
  <h2 class="cards-services__title">Услуги</h2>

  <div class="container__wrapper">
    <div v-if="!(isEmpty(servicesList))" class="cards-services__content">
      <div class="cards-services__item" v-for="service of servicesList" :key="service.id">
        <card-services
          :service="service"
        />
      </div>
    </div>

    <div v-else class="cards-services__content">
      <div class="cards-services__item" v-for="skeleton of 3">
        <skeleton-card-service />
      </div>
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

.container__wrapper {
  width: 100%;
}
</style>
