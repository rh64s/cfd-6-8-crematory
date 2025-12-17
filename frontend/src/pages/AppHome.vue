<script setup lang="ts">
import SupportMessage from "@/components/landing/SupportMessage.vue";
import AboutUs from "@/components/landing/AboutUs.vue";
import CardsServices from "@/components/landing/CardsServices.vue";
import NotAlone from "@/components/landing/NotAlone.vue";
import FrequentQuestions from "@/components/landing/FrequentQuestions.vue";
import OurEmployees from "@/components/landing/OurEmployees.vue";
import UrnsAshes from "@/components/landing/UrnsAshes.vue";
import {useApiStore} from "@/stores/ApiStore.ts";
import {onMounted, ref} from "vue";
import type {Services, Urn} from "@/utilities/types.ts";

const apiStore = useApiStore();

const formatProductName = (item: Urn) => {
  item.name = item.name.split(" ")[1] ?? "Нет данных";
}

const arrayLinkImageUrns = ["metal.png", "tree.png", "ceramics.png", "biodegradable.png", "plastic.png"];
const urnsList = ref([])
const servicesList = ref([])

onMounted(async () => {
  const data = await apiStore.fetchDataApi()

  servicesList.value = data.filter((item: Services) => {
    return item.name.split(' ')[0] !== 'Урна'
  })
  servicesList.value = servicesList.value.slice(1, -1)

  urnsList.value = data.filter((item: Urn) => {
    return item.name.split(' ')[0] === 'Урна'
  })

  urnsList.value.forEach((item: Urn, index) => {
    formatProductName(item)
    item.imageLink = arrayLinkImageUrns[index] ?? "Картинки нет";
  })

  servicesList.value = JSON.parse(JSON.stringify(servicesList.value))
})
</script>

<template>
  <support-message />
  <about-us id="about" />
  <cards-services id="services" :servicesList="servicesList" />
  <urns-ashes :urnsList="urnsList" />
  <not-alone id="intimate" />
  <our-employees id="employees" />
  <frequent-questions id="questions" />
</template>

<style scoped lang="scss">

</style>
