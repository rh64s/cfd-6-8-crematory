<script setup lang="ts">
import {navLinkList} from "@/utilities/navLink.ts";
import {ref} from "vue";
import type {NavLink} from "@/utilities/types.ts";

const links = ref<NavLink[]>([])
links.value = navLinkList.slice(0, navLinkList.length - 1)
</script>

<template>
  <footer class="footer">
    <div class="footer__inner">
      <nav class="footer__block">
        <router-link to="/#about" class="footer__link">о нас</router-link>
        <router-link to="/#employees" class="footer__link">наши сотрудники</router-link>
        <router-link to="/#intimate" class="footer__link">близким</router-link>
        <router-link to="/#services" class="footer__link">услуги</router-link>
      </nav>
      <nav class="footer__block">
        <a href="#" class="footer__link">Наш адрес: Томская обл., г. Томск, ул. Нахимова, 45</a>
        <a href="tel:88001234567" class="footer__link">Круглосуточная линия помощи: 8 (800) 123-45-67</a>
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
    justify-content: center;
    row-gap: 20px;
  }

  &__link {
    font-size: 1.25rem;
    color: $color-white;
  }
}
</style>
