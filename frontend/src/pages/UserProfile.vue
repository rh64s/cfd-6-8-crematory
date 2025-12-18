<script setup lang="ts">
import {personalInformation} from "@/utilities/personal-information.ts";
</script>

<template>
<section class="personal-information">
  <h2 class="personal-information__title">Личные данные</h2>

  <div class="personal-information__info">
    <div v-for="data of personalInformation" :key="data.name" class="personal-information__data">
      <span class="personal-information__name">{{ data.name }}</span>
      <span class="personal-information__description">{{ data.description }}</span>
    </div>
  </div>

  <div class="personal-information__buttons">
    <button class="personal-information__button--trash">
      <img src="@/assets/image/icons/trash.svg" alt="удалить">
      <span>Удалить аккаунт</span>
    </button>
    <button class="personal-information__button--edit">
      <img src="@/assets/image/icons/edit.svg" alt="удалить">
      <span>Изменить</span>
    </button>
  </div>
</section>
</template>

<style scoped lang="scss">
button {
  outline: none;
  border: none;
  background: transparent;
  padding: 10px 40px;
}

.personal-information {
  display: flex;
  flex-direction: column;
  align-items: center;
  row-gap: 50px;
  max-width: 750px;
  width: 100%;

  &__info {
    width: 100%;
    display: flex;
    flex-direction: column;
    row-gap: 10px;
  }

  &__name {
    font-size: 1.5rem;
    color: $color-gray;
  }

  &__description {
    font-size: 1.5rem;
    color: $color-gray;
    opacity: 0.8;
  }

  &__data {
    @extend .base-block;
    padding: 10px 100px;
    width: 100%;
    display: flex;
    justify-content: space-between;
  }

  &__buttons {
    display: flex;
    align-items: center;
    column-gap: 20px;
  }

  &__button--trash {
    column-gap: 10px;
    color: $color-gray;
    @extend .base-block;
  }

  &__button--edit {
    column-gap: 10px;
    color: $color-white;
    background-color: $color-gray;
    border-radius: 33px;
    display: flex;
    align-items: center;
  }
}
</style>
