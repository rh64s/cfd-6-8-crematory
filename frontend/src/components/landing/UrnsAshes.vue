<script setup lang="ts">
import CardUrnAshes from "@/components/shared/UI/card/CardUrnAshes.vue";
import type {Urn} from "@/utilities/types.ts";

interface iProps {
  urnsList: Urn[]
}

defineProps<iProps>()
</script>

<template>
  <section class="urns-ashes">
    <h2 class="urns-ashes__title">Урны для праха</h2>

    <div class="urns-ashes__list">
      <div class="urns-ashes__card" v-for="urn of urnsList" :key="urn.id">
        <card-urn-ashes
          :urn="urn"
        />
      </div>
    </div>
  </section>
</template>

<style scoped lang="scss">
.urns-ashes {
  display: flex;
  flex-direction: column;
  align-items: center;
  row-gap: 40px;
  width: 100%;

  &__list {
    display: flex;
    justify-content: space-between;
    width: 100%;
  }
}
</style>
