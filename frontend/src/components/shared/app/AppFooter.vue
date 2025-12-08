<script setup lang="ts">

</script>

<template>
  <footer class="footer">
    <div class="footer__inner">
      <nav class="footer__block">
        <a href="#" class="footer__link">О нас</a>
        <a href="#" class="footer__link">Наши сотрудники</a>
        <a href="#" class="footer__link">Близким</a>
        <a href="#" class="footer__link">Услуги</a>
      </nav>
      <nav class="footer__block">
        <a href="#" class="footer__link">Наш адрес: Томская обл., г. Томск, ул. Нахимова, 45</a>
        <a href="#" class="footer__link">Круглосуточная линия помощи: 8 (800) 123-45-67</a>
        <a href="#" class="footer__link">E-mail: info@crematory.ru</a>
        <a href="#" class="footer__link">Регистрация</a>
      </nav>
      <nav class="footer__block">
        <a href="#" class="footer__link">Правовая информация</a>
        <a href="#" class="footer__link">Политика конфиденциальности</a>
        <a href="#" class="footer__link">FAQ (Часто задаваемые вопросы)</a>
        <a href="#" class="footer__link">&copy; 2025 Crem. Все права защищены.</a>
      </nav>
    </div>
  </footer>
</template>

<style scoped lang="scss">
.footer {
  background-color: $color-gray;
  padding: 110px 0;
  margin-top: 100px;

  &__inner {
    max-width: 1520px;
    margin: 0 auto;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  &__block {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    row-gap: 20px;
  }

  &__link {
    font-size: 1.25rem;
    color: $color-white;
  }
}
</style>
