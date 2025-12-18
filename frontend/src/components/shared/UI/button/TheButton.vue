<script setup lang="ts">

  interface IProps {
    type?: "button" | "reset" | "submit" ;
  }
  const props = defineProps<IProps>()

</script>
<template>
  <button :type="type ?? 'button' " class="button">
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
  transition: 0.3s;

  &:hover{
    background: $btn-color-hover;
  }

  &:active{
    background: $btn-color-active;
  }
}
</style>
