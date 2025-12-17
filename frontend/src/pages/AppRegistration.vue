<script setup lang="ts" xmlns="http://www.w3.org/1999/html">
  import FormInput from "@/components/shared/UI/form/FormInput.vue"
  import TheButton from "@/components/shared/UI/button/TheButton.vue";
  import type { UserRegister } from "@/utilities/API/typesApi.ts";
  import {ref} from "vue";

  const FormData = ref<UserRegister>({
    first_name: '',
    last_name: '',
    patronymic: '',
    login: '',
    phone: '',
    email: '',
    password: '',
  })




</script>

<template>
  <section class="registration">
    <h1 class="registration__title">Регистрация</h1>
    <form class="form" @submit.prevent="SubmitRegister">
      <div class="form__block">
        <form-input
          :v-model="FormData.first_name"
          placeholder="Фамилия"
          required
        />
        <span v-if="errors.name" class="error">{{ errors.first_name }}</span>
        <form-input
          :v-model="FormData.last_name"
          placeholder="Имя"
          required
        />
        <span v-if="errors.name" class="error">{{ errors.last_name }}</span>
        <form-input
          :v-model="FormData.patronymic"
          placeholder="Отчество (необязательно)"
        />
        <span v-if="errors.name" class="error">{{ errors.patronymic }}</span>
        <form-input
          :v-model="FormData.login"
          placeholder="Придумайте логин"
          required
        />
        <span v-if="errors.name" class="error">{{ errors.login }}</span>
        <form-input
          :v-model="FormData.phone"
          type="tel"
          placeholder="Номер телефона"
          required
        />
        <span v-if="errors.name" class="error">{{ errors.phone }}</span>
        <form-input
          :v-model="FormData.email"
          type="email"
          placeholder="Email (необязательно)"
        />
        <span v-if="errors.name" class="error">{{ errors.email }}</span>
        <form-input
          :v-model="password1"
          placeholder="Придумайте пароль"
          type="password"
          id="inputPassword1"
          password
          required
        />
        <span v-if="errors.name" class="error">{{ errors.password1 }}</span>
        <form-input
          :v-model="password2"
          placeholder="Введите пароль ещё раз"
          type="password"
          id="inputPassword2"
          password
          required
        />
      </div>
      <div class="form__checkbox">
        <label class="label">
          <input class="input-checkbox" type="checkbox" required/>
          Даю согласие на обработку персональных данных
        </label>
        <label class="label">
          <input class="input-checkbox" type="checkbox" required/>
          Согласен с политикой конфидециальности
        </label>
      </div>
      <div class="form__links">
        <the-button type="submit">регистрация</the-button>
        <router-link to="/login">
          <p class="form__link">Уже есть аккаунт?</p>
        </router-link>
      </div>
    </form>
  </section>
</template>

<style scoped lang="scss">

.registration{
  max-width: 750px;
  width: 100%;
  display: flex;
  flex-direction: column;
  gap: 40px;

  .registration__title{
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
  }

  &__link{
    font-family: $font-primary;
    font-weight: $font-weight-regular;
    font-size: 1rem;
    color: $color-gray;
  }
}
.label{
  display: flex;
  gap: 10px;
  align-items: center;
  font-family: $font-primary;
  font-weight: $font-weight-regular;
  font-size: 1rem;
  color: $color-gray;
}

.input-checkbox{
  position: relative;
  display: flex;
  appearance: none;
  width: 25px;
  height: 25px;
  border-radius: 5px;
  justify-content: center;
  align-items: center;
  border: 1px solid $color-gray;

  &:hover{
    border-color: $btn-color-hover;
  }

  &::before{
    inset: 4px;
    content: "";
    opacity: 0;
    position: absolute;
    background-image: url("@/assets/image/icons/check.svg") ;
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
  }

  &:checked{
    border-color: 1px solid $btn-color-active;
  }

  &:checked::before{
    opacity: 1;
  }
}

</style>
