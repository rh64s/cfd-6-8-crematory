import type {UserRegister} from "@/utilities/API/typesApi.ts";
import {ref} from "vue";

export const ValidatorsRegister = (data : UserRegister) => {
  const errors = ref<UserRegister>({
    first_name: '',
    last_name: '',
    patronymic: '',
    login: '',
    phone: '',
    email: '',
    password: '',
  })

  const validateName = (data: string) => {
    try{
      const NamePattern = /^[a-zA-Zа-яА-ЯёЁ\-\s]+$/ ;
      if (!data){
        errors.value.first_name = "Имя пользователя обязательно";
        return errors;
      }
      if (data.length > 255){
        errors.value.first_name = "Имя слишком длинное";
        return errors;
      }
      if (data.length < 2) {
        errors.value.first_name = "Имя слишком короткое";
        return errors;
      }
      if (NamePattern.test(data)) {
        errors.value.first_name = "Используются недопустимые значения";
        return errors;
      }
    }
    catch (error) {

    }
  }
}
