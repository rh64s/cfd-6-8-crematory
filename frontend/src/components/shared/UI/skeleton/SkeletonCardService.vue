<script setup lang="ts">

</script>

<template>
  <article class="service-card">
    <div class="service-card__header">
      <div class="service-card__text-block">
        <div class="skeleton-line title"></div>
        <div class="skeleton-line price"></div>
      </div>
      <div class="skeleton-circle icon"></div>
    </div>

    <div class="skeleton-line description"></div>
    <div class="skeleton-line description"></div>
    <div class="skeleton-line description"></div>
    <div class="skeleton-shine"></div>
  </article>
</template>

<style scoped lang="scss">
.service-card {
  position: relative;
  background-color: #f5f5f5;
  border-radius: 33px;
  padding: 40px 20px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.05);
  animation: pulse 1.5s ease-in-out infinite;
  overflow: hidden;
  height: 245px;
  max-width: 494px;
  width: 100%;

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

.title {
  height: 20px;
  width: 70%;
}

.price {
  height: 18px;
  width: 50%;
}

.description {
  height: 16px;
  width: 90%;
}

.icon {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background-color: #d0d0d0;
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
