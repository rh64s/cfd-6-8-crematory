<script setup lang="ts">
  import FormInput from "@/components/shared/UI/form/FormInput.vue"



</script>

<template>
  <section class="registration">
    <h1 class="registration__title">Регистрация</h1>
    <form class="form">
      <div class="form__block">
        <form-input placeholder="Фамилия" required></form-input>
        <form-input placeholder="Имя" required ></form-input>
        <form-input placeholder="Отчество (необязательно)"></form-input>
        <form-input placeholder="Придумайте логин" required></form-input>
        <form-input type="tel" placeholder="Номер телефона" required></form-input>
        <form-input type="email" placeholder="Email (необязательно)"></form-input>
        <form-input placeholder="Придумайте пароль" required id="inputPassword1"></form-input>
        <form-input placeholder="Введите пароль ещё раз" required id="inputPassword2"> </form-input>


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
      font-family: "Inter", sans-serif;
      font-weight: lighter;
      text-align: center;
  }
}

.form{
  width: 100%;

  &__block{
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 20px;
  }
}
</style>
