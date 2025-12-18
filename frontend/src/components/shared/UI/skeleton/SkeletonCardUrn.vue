<script setup lang="ts">

</script>

<template>
  <article class="urn-ashes-card">
    <div class="skeleton-line urn-ashes-card__image"></div>

    <div class="urn-ashes-card__info">
      <div class="skeleton-line urn-ashes-card__name"></div>
      <div class="skeleton-line urn-ashes-card__price-range"></div>
    </div>
    <div class="skeleton-shine"></div>
  </article>
</template>

<style scoped lang="scss">
.urn-ashes-card {
  position: relative;
  background-color: #f5f5f5;
  border-radius: 33px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.05);
  animation: pulse 1.5s ease-in-out infinite;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  align-items: center;
  padding-bottom: 20px;
  max-width: 289px;
  row-gap: 20px;

  &__image {
    border-radius: 33px;
    width: 287px;
    height: 230px;
  }

  &__info {
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    row-gap: 8px;
    width: 100%;
  }

  &__name {
    width: 60%;
    height: 20px;
  }

  &__price-range {
    width: 80%;
    height: 15px;
  }
}
.service-card {
  &__header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 30px;
  }

  &__text-block {
    display: flex;
    align-items: start;
    justify-content: center;
    flex-direction: column;
    row-gap: 8px;
    width: 100%;
  }
}

.skeleton-line {
  background-color: #e0e0e0;
  border-radius: 4px;
  margin-bottom: 8px;
}

.skeleton-shine {
  position: absolute;
  top: 0;
  left: -100%;
  width: 50%;
  height: 100%;
  background: linear-gradient(
      90deg,
      rgba(255,255,255,0) 0%,
      rgba(255,255,255,0.3) 50%,
      rgba(255,255,255,0) 100%
  );
  animation: shine 1.8s ease-in-out infinite;
  z-index: 1;
}

@keyframes pulse {
  0% { opacity: 0.8; }
  50% { opacity: 1; }
  100% { opacity: 0.8; }
}

@keyframes shine {
  0% { left: -100%; }
  100% { left: 100%; }
}
</style>
