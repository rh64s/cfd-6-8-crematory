<script setup lang="ts">

</script>

<template>
  <section class="not-alone">
    <h2 class="not-alone__title">Вам <span class="not-alone__title--underline">не</span> нужно через
      это походить в одиночку</h2>

    <div class="not-alone__content">
      <article class="not-alone__card not-alone__card--emphasized card--normal">
        <h3 class="card__title">Первые и самые важные шаги</h3>

        <ul class="card__list">
          <li>наш сотрудник выслушает и подскажет, что делать дальше</li>
          <li>мы ответим на все ваши вопросы</li>
        </ul>
      </article>
      <article class="card--normal">
        <img src="@/assets/image/products/together-illustration-first.png" alt="картинка">
      </article>
      <article class="not-alone__card not-alone__card--emphasized card--normal">
        <h3 class="card__title">Поручите нам решение вопросов</h3>

        <ul class="card__list">
          <li>координация всех этапов в один день</li>
          <li>взаимодействие с государственными органами для получения документов</li>
        </ul>
      </article>
      <article class="card--normal">
        <img src="@/assets/image/products/together-illustration-second.png" alt="картинка">
      </article>
      <article class="not-alone__card not-alone__card--emphasized card--large">
        <h3 class="card__title">Как позаботиться о себе и близких в это время</h3>

        <ul class="card__list">
          <li>принимайте помощь</li>
          <li>во время стресса легко забыть о базовых потребностях</li>
          <li>делайте маленькие паузы</li>
          <li>не вините себя</li>
          <li>разрешите себе чувствовать горечь утраты без чувства вины</li>
        </ul>
      </article>
      <div class="not-alone__card--container card--small">
        <article class="not-alone__card not-alone__card--emphasized">
          <h3 class="card__title">Круглосуточная линия поддержки</h3>

          <div class="card__contact">
            <img src="@/assets/image/icons/phone-call.svg" alt="phone">
            <span>8 (800) 123-45-67</span>
          </div>
        </article>
        <article class="not-alone__card--gray">
          <p>Вы не одни. Мы рядом. Когда мир перевернулся с ног на голову.</p>
        </article>
      </div>
    </div>
  </section>
</template>

<style scoped lang="scss">
.not-alone {
  display: flex;
  flex-direction: column;
  align-items: center;
  row-gap: 40px;
  font-size: 1.25rem;

  & article {
    border-radius: 33px;
  }

  &__title--underline {
    text-decoration-line: underline;
    text-decoration-style: wavy;
    text-decoration-color: $color-gray;
    text-underline-offset: 4px;
    text-decoration-thickness: 3px;
  }

  &__content {
    display: grid;
    grid-template-columns: repeat(15, 1fr);
    gap: 18px;
  }

  &__card {
    display: flex;
    flex-direction: column;
    align-items: center;

    &--container {
      display: flex;
      flex-direction: column;
      row-gap: 18px;
    }

    &--emphasized {
      @extend .base-block;
      flex-direction: column;
      align-items: flex-start;
      row-gap: 32px;
      padding: 40px;
    }

    &--gray {
      background-color: $color-gray;
      color: $color-white;
      padding: 40px;

      & > p {
        line-height: 32px;
      }
    }
  }
}

.card {
  &__list {
    display: flex;
    flex-direction: column;
    row-gap: 20px;
    list-style: none;

    & > li {
      position: relative;
      padding-left: 1.25em;
      color: $color-gray;
    }

    & > li::before {
      content: "•";
      position: absolute;
      left: 0;
      color: $color-black;
    }
  }

  &__title {
    color: $color-black;
    font-weight: $font-weight-regular;
    text-align: center;
    font-size: 1.25rem;
  }

  &__contact {
    display: flex;
    align-items: center;
    column-gap: 20px;
    color: $color-black;
    margin: auto;
  }

  &--normal img,
  &--large img {
    width: 100%;
    object-fit: cover;
    display: block;
  }

  &--small {
    grid-column: span 4;
    grid-row: span 1;
  }

  &--normal {
    grid-column: span 5;
    grid-row: span 1;
  }

  &--large {
    grid-column: span 6;
    grid-row: span 1;
  }
}
</style>
