<script setup lang="ts" xmlns="http://www.w3.org/1999/html">
  import FormInput from "@/components/shared/UI/form/FormInput.vue"
  import TheButton from "@/components/shared/UI/button/TheButton.vue";


</script>

<template>
  <section class="registration">
    <h1 class="registration__title">Регистрация</h1>
    <form class="form">
      <div class="form__block">
        <form-input
          placeholder="Фамилия"
          required
        />
        <form-input
          placeholder="Имя"
          required
        />
        <form-input
          placeholder="Отчество (необязательно)"
        />
        <form-input
          placeholder="Придумайте логин"
          required
        />
        <form-input
          type="tel"
          placeholder="Номер телефона"
          required
        />
        <form-input
          type="email"
          placeholder="Email (необязательно)"
        />
        <form-input
          placeholder="Придумайте пароль"
          type="password"
          id="inputPassword1"
          password
          required
        />
        <form-input
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
          <p>Уже есть аккаунт?</p>
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

}
.input-checkbox::before{
  inset: 4px;
  content: "";
  opacity: 0;
  position: absolute;
  background-image: url("@/assets/image/icons/check.svg") ;
  background-size: contain;
  background-position: center;
  background-repeat: no-repeat;
}

.input-checkbox:checked{
  border-color: 1px solid $btn-color-active;
}
.input-checkbox:checked::before{
  opacity: 1;
}
</style>
