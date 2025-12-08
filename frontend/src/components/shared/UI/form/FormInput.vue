<script setup lang="ts">
</script>
<template>
  <label class="label" id=""></label>
  <input class="input" type="text" placeholder="" />
</template>
<style lang="scss" scoped>
.input{
  color: $color-gray;
  font-family: "Inter", sans-serif;
  border: none;
  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.25);
  border-radius: 33px;
  border: 1px solid rgba(217, 218, 242, 1);
  padding: 13px 30px;
}
.input:hover{
  color: rgba(105, 105, 105, 1);
}
.input:focus{
  color: $color-gray;
  font-family: "Inter", sans-serif;
  outline: none;
  border: 1px solid rgba(217, 218, 242, 1);
}
</style>
