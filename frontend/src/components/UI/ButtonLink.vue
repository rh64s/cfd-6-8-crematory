<script setup lang="ts">

</script>
<template>
    <div class="button-link">
      <img src="@/assets/image/icons/arrow.svg" alt="стрелка">
    </div>
</template>
<style scoped lang="scss">

.button-link{
  background: $link-btn;
  border: none;
  border-radius: 50px;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 10px;
  cursor: pointer;

  &:hover{
    background: $link-btn-hover;
  }
  &:active{
    background: $link-btn-active;
  }
}


</style>
