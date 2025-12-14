<script setup lang="ts">
import {employeesList} from "@/utilities/employeesCard.ts";
import CardEmployees from "@/components/shared/UI/card/CardEmployees.vue";
</script>

<template>
  <section class="our-employees">
    <h2>Наши сотрудники</h2>

    <div class="our-employees__list">
      <div v-for="employee of employeesList"
           :key="employee.id">

          <card-employees
            :employee="employee"
          />
      </div>
    </div>
  </section>

</template>

<style scoped lang="scss">

.our-employees {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 100%;
  row-gap: 40px;

  &__list {
    display: flex;
    justify-content: space-between;
    width: 100%;
  }
}
</style>
