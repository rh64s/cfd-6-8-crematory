<script setup lang="ts" xmlns="http://www.w3.org/1999/html">
  import FormInput from "@/components/shared/UI/form/FormInput.vue"
  import TheButton from "@/components/shared/UI/button/TheButton.vue";
  import type { UserRegister } from "@/utilities/API/typesApi.ts";
  import {computed, ref} from "vue";
  import {
    errors,
    validateName,
    validateLastName,
    validatePatronymic,
    validateLogin,
    validatePhone,
    validatePassword,
    validateEmail,
    validatePassword2
  } from "@/utilities/validators.ts";
  import { useUsersStore } from "@/stores/UserStore.ts";

  const store = useUsersStore()
  const errorsArea = computed(() => errors)

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
    <form class="form" @submit.prevent="store.CreateUser(FormData)">
      <div class="form__block" >
        <div>
          <form-input
            @input="validateLastName"
            v-model="FormData.last_name"
            placeholder="Фамилия"
            :class="{ 'errors' : errors.last_name}"
            required
          />
          <span v-if="errors.last_name" class="error">{{ errors.last_name }}</span>
        </div>
        <div>
          <form-input
            @input="validateName"
            v-model="FormData.first_name"
            :class="{ 'errors' : errors.first_name}"
            placeholder="Имя"
            required
          />
          <span v-if="errors.first_name" class="error">{{ errors.first_name }}</span>
        </div>
        <div>
          <form-input
            @input="validatePatronymic"
            v-model="FormData.patronymic"
            :class="{ 'errors' : errors.patronymic}"
            placeholder="Отчество (необязательно)"
          />
          <span v-if="errors.patronymic" class="error">{{ errors.patronymic }}</span>
        </div>
        <div>
          <form-input
            @input="validateLogin"
            v-model="FormData.login"
            :class="{ 'errors' : errors.login}"
            placeholder="Придумайте логин"
            required
          />
          <span v-if="errors.login" class="error">{{ errors.login }}</span>
        </div>
        <div>
          <form-input
            @input="validatePhone"
            v-model="FormData.phone"
            type="tel"
            :class="{ 'errors' : errors.phone}"
            placeholder="Номер телефона"
            required
          />
          <span v-if="errors.phone" class="error">{{ errors.phone }}</span>
        </div>
        <div>
          <form-input
            @input="validateEmail"
            v-model="FormData.email"
            type="email"
            :class="{ 'errors' : errors.email}"
            placeholder="Email (необязательно)"
          />
          <span v-if="errors.email" class="error">{{ errors.email }}</span>
        </div>
        <div>
          <form-input
            @input="validatePassword"
            v-model="FormData.password"
            :class="{ 'errors' : errors.password}"
            placeholder="Придумайте пароль"
            type="password"
            id="inputPassword1"
            password
            required
          />
          <span v-if="errors.password" class="error">{{ errors.password }}</span>
        </div>
        <div>
          <form-input
            @input="validatePassword2"
            placeholder="Введите пароль ещё раз"
            type="password"
            id="inputPassword2"
            password
            required
          />
          <span v-if="errors.password2" class="error">{{ errors.password2 }}</span>
        </div>
        <span v-if="store.errorRegistr" class="error"> {{ store.errorRegistr }}</span>
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

.errors{
  outline: 2px solid rgba(231, 69, 69, 1);
}
.error{
  color: rgba(245, 124, 124, 1);
  font-family: $font-primary;
  font-weight: bold;
  font-size: .8rem;
}
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
    transition: .3s;
  }
  &__link:hover{
    color: $btn-color-hover;
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
    transition: .2s;
  }

  &:checked{
    border-color: 1px solid $btn-color-active;
  }

  &:checked::before{
    opacity: 1;
  }
}

</style>
