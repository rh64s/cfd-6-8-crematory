<script setup lang="ts">

</script>
<template>
  <button type="button" class="button">
    <slot></slot>
  </button>
</template>
<style scoped lang="scss">
.button{
  font-family: "Inter", sans-serif;
  border: none;
  font-size: 1rem;
  padding: 10px 40px;
  background: $btn-color;
  border-radius: 33px;
  color: $color-white;
  cursor: pointer;

  &:hover{
    background: $btn-color-hover;
  }

  &:active{
    background: $btn-color-active;
  }
}
</style>
