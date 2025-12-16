<script setup lang="ts">
</script>


<template>
    <input class="input" type="text">
</template>


<style lang="scss" scoped>
.input{
  width: 100%;
  color: $color-gray;
  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.25);
  border-radius: 33px;
  border:  1px solid rgba(217, 218, 242, 1) ;
  padding: 13px 30px;
  transition: border .1s ease-in-out;
  font-family: "Inter", sans-serif;

    &:hover{
      border: 3px solid rgba(217, 218, 242, 1);
      cursor: pointer;
    }

    &:focus{
      color: $color-gray;
      font-family: "Inter", sans-serif;
      outline: none;
      border: 3px solid rgba(217, 218, 242, 1);

    }

  &::placeholder{
    font-size: 1rem;
    font-family: "Inter", sans-serif;
    color: $color-gray;
  }
}

</style>
