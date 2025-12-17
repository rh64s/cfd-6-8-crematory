<script setup lang="ts">

  import EyePassword from "@/components/shared/UI/form/EyePassword.vue";
  import {ref} from "vue";

  interface IProps {
    type?: string,
    placeholder?: string,
    required?: boolean,
    password?: boolean,
  }

  const props = defineProps<IProps>()

  const typePassword = ref<string>(props.type ?? 'text')

  const passwordCheck = () => {
    if ( typePassword.value == 'password') typePassword.value = 'text'
    else typePassword.value = 'password'
  }


</script>
<template>

  <label class="label">
    <input class="input" :type="typePassword" :placeholder="placeholder" :required="required">
    <div v-if="password">
      <eye-password :check="typePassword == 'password'" @click="passwordCheck" />
    </div>
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
  cursor: text;
  display: flex;

}
.input{
  width: 100%;
  font-family: $font-primary;
  border: none;
}
.label:hover{
  outline: 2px solid rgba(217, 218, 242, 1);
}
.input:focus{
  color: $color-gray;
  font-family: $font-primary;
  outline: none;
}
.label:has(:focus){
  outline: 3px solid rgba(217, 218, 242, 1);
}
.input::placeholder{
  color: $color-gray;
  font-family: $font-primary;
  font-size: 1rem;
  font-weight: $font-weight-regular;
}
</style>
