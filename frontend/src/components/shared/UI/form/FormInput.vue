<script setup lang="ts">
</script>


<template>
  <label class="label">
    <input class="input" type="text" placeholder="" />
  </label>
</template>


<style lang="scss" scoped>
.label{
  color: $color-gray;
  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.25);
  border-radius: 33px;
  border:  1px solid rgba(217, 218, 242, 1) ;
  padding: 13px 30px;
  transition: border .2s ease-in-out;
}
.input{
  font-family: "Inter", sans-serif;
  border: none;
}
.label:hover{
  border: 3px solid rgba(217, 218, 242, 1);
}
.input:focus{
  color: $color-gray;
  font-family: "Inter", sans-serif;
  outline: none;
  border: 1px solid rgba(217, 218, 242, 1);
}
.input:focus .label{
  border: 3px solid rgba(217, 218, 242, 1);
}
</style>
