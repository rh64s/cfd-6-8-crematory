<script setup lang="ts">
import FormInput from "@/components/shared/UI/form/FormInput.vue";
import TheButton from "@/components/shared/UI/button/TheButton.vue";
import type {UserLogin} from "@/utilities/API/typesApi.ts";
import { useUsersStore } from "@/stores/UserStore.ts";

import {ref} from "vue";

const store = useUsersStore();

const FormData = ref<UserLogin>({
  login: "",
  password: "",
});

</script>

<template>
  <section class="login">
    <h1 class="login__title">Вход</h1>
    <form class="form" @submit.prevent="store.LoginUser(FormData)">
      <div class="form__block" >
        <div>
          <form-input
            v-model="FormData.login"
            placeholder="Логин"
            required
          />
        </div>
        <div>
          <form-input
            v-model="FormData.password"
            placeholder="Пароль"
            password
            required
          />
          <span v-if="store.errorLogin" class="error"> {{ store.errorLogin }}</span>
        </div>
        <div class="form__links">
          <p class="form__link">Забыли пароль?</p>
          <router-link to="/login">
            <p class="form__link">Уже есть аккаунт?</p>
          </router-link>
        </div>
      </div>
      <div>
        <the-button type="submit">войти</the-button>
      </div>
    </form>
  </section>
</template>

<style scoped lang="scss">
.error{
  color: rgba(245, 124, 124, 1);
  font-family: $font-primary;
  font-weight: bold;
  font-size: .8rem;
}

.login{
  max-width: 750px;
  width: 100%;
  display: flex;
  flex-direction: column;
  gap: 40px;

  .login__title{
    font-size: 2rem;
    font-family: $font-primary;
    font-weight: $font-weight-light;
    text-align: center;
  }
}
.form{
  width: 100%;
  display: flex;
  flex-direction: column;
  gap: 40px;
  &__block{
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 20px;
  }

  &__checkbox{
    display: flex;
    flex-direction: column;
    gap: 20px;
  }

  &__links{
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 30px;
  }

  &__link{
    font-family: $font-primary;
    font-weight: $font-weight-regular;
    font-size: 1rem;
    color: $color-gray;
    transition: .3s;
    cursor: pointer;
  }
  &__link:hover{
    color: $btn-color-hover;
  }
}
</style>
