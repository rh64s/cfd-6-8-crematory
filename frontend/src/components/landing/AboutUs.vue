<script setup lang="ts">

</script>

<template>
<section class="about-us">
  <h2 class="about-us__title">О нас</h2>

  <div class="about-us__content">
    <div class="about-us__info">
      <div class="about-us__text">
        <p>
          Наш крематорий был основан в 1995 году и за годы работы стал символом достоинства  и уважения к памяти усопших.
          Мы сочетаем традиционные ценности с современными технологиями, чтобы обеспечить родственникам максимальный комфорт в трудную минуту.
        </p>
      </div>
      <div class="about-us__legislation">
        <a href="#">Мы работаем в соответствии с действующим законодательством
          Российской Федерации и имеем все необходимые лицензии
          и санитарные разрешения.</a>
      </div>
    </div>
    <div class="about-us__contacts">
      <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A157700d00dd962f33ae5cdb9134634c8abfce63ded8e193fa2b54801acfcac2a&amp;source=constructor"
              width="620" height="240" class="about-us__map"></iframe>

      <p class="about-us__contacts--text">Наше местоположение: г. Томск, ул. Яковлева д. 19</p>
    </div>
  </div>
</section>
</template>

<style scoped lang="scss">
.about-us {
  row-gap: 40px;
  display: flex;
  flex-direction: column;
  align-items: center;

  &__content {
    display: flex;
    align-items: flex-start;
    column-gap: 18px;
  }

  &__info {
    flex: 1;
    display: flex;
    flex-direction: column;
    row-gap: 15px;
  }

  &__text {
    @extend .base-block;
    padding: 20px 36px;
    font-size: 1.25rem;
    font-weight: $font-weight-light;
  }

  &__legislation {
    max-width: 610px;
    padding: 0 40px;

    a {
      text-decoration: underline;
      text-underline-offset: 4px;
      color: $color-gray;
    }
  }

  &__contacts {
    max-width: 620px;
    display: flex;
    flex-direction: column;
    row-gap: 10px;

    &--text {
      font-size: 1.25rem;
    }
  }

  &__map {
    border-radius: 33px;
    border: none;
  }
}


</style>
