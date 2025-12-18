import type {UserRegister} from "@/utilities/API/typesApi.ts";
import {ref} from "vue";

  interface errorsPassword extends UserRegister {
    password2: string;
  }

  export const errors = ref<errorsPassword>({
    first_name: '',
    last_name: '',
    patronymic: '',
    login: '',
    phone: '',
    email: '',
    password: '',
    password2: '',
  })

  const password = ref<string>()


export const validateName = (event: InputEvent) => {
    const data = (event.target as HTMLInputElement).value
    try{
      const NamePattern = /^[a-zA-Zа-яА-ЯёЁ\-\s]+$/ ;
      if (!data){
        errors.value.first_name = "Поле обязательно для заполнения";
        return errors;
      }
      else if (data.length > 255){
        errors.value.first_name = "Слишком длинное значени";
        return errors;
      }
      else if (data.length < 2) {
        errors.value.first_name = "Слишком короткое значение";
        return errors;
      }
      else if (!NamePattern.test(data)) {
        errors.value.first_name = "Используются недопустимые значения";
        return errors;
      }
      else {
        errors.value.first_name = '';
      }
    }
    catch (error) {

    }
  }
export const validateLastName = (event: InputEvent) => {
  const data = (event.target as HTMLInputElement).value
  try{
    const NamePattern = /^[a-zA-Zа-яА-ЯёЁ\-\s]+$/ ;
    if (!data){
      errors.value.last_name = "Поле обязательно для заполнения";
      return errors;
    }
    else if (data.length > 255){
      errors.value.last_name = "Слишком длинное значение";
      return errors;
    }
    else if (data.length < 2) {
      errors.value.last_name = "Слишком короткое значение";
      return errors;
    }
    else if (!NamePattern.test(data)) {
      errors.value.last_name = "Используются недопустимые значения";
      return errors;
    }
    else {
      errors.value.last_name = '';
    }
  }
  catch (error) {

  }
}


export const validatePatronymic = (event: InputEvent) => {
  const data = (event.target as HTMLInputElement).value
  try{
    const NamePattern = /^[a-zA-Zа-яА-ЯёЁ\-\s]+$/ ;
    if (!data){
      errors.value.patronymic = "";
      return errors;
    }
    else if (data.length > 255){
      errors.value.patronymic = "Слишком длинное значение";
      return errors;
    }
    else if (data.length < 2) {
      errors.value.patronymic = "Слишком короткое значение";
      return errors;
    }
    else if (!NamePattern.test(data)) {
      errors.value.patronymic = "Используются недопустимые значения";
      return errors;
    }
    else {
      errors.value.patronymic = '';
    }
  }
  catch (error) {
  }
}

export const validateLogin = (event: InputEvent) => {
  const data = (event.target as HTMLInputElement).value
  try{
    const NamePattern =  /^[A-Za-z0-9]+$/;
    if (!data){
      errors.value.login = "Поле обязательно для заполнения";
      return errors;
    }
    else if (data.length > 62){
      errors.value.login = "Слишком длинное значение";
      return errors;
    }
    else if (data.length < 6) {
      errors.value.login = "Слишком короткое значение";
      return errors;
    }
    else if (!NamePattern.test(data)) {
      errors.value.login = "Используются недопустимые значения";
      return errors;
    }
    else {
      errors.value.login = '';
    }
  }
  catch (error) {
  }
}

export const validatePhone = (event: InputEvent) => {
  const data = (event.target as HTMLInputElement).value
  try{
    const NamePattern =  /^[\s\+\(\)-]*(\+?7|8)[\s\(\)-]*(\d[\s\(\)-]*){10}[\s\(\)-]*$/;
    if (!data){
      errors.value.phone = "Поле обязательно для заполнения";
      return errors;
    }
    else if (data.length > 20){
      errors.value.phone = "Слишком длинное значение";
      return errors;
    }
    else if (data.length < 10) {
      errors.value.phone = "Слишком короткое значение";
      return errors;
    }
    else if (!NamePattern.test(data)) {
      errors.value.phone = "Используются недопустимые значения или формат";
      return errors;
    }
    else {
      errors.value.phone = '';
    }
  }
  catch (error) {
  }
}

export const validateEmail = (event: InputEvent) => {
  const data = (event.target as HTMLInputElement).value
  try{
    const NamePattern =  /^[\w.\-]+@[\w]+.[\w]{2,}$/;
    if (!data){
      errors.value.email = "";
      return errors;
    }
    else if (data.length > 255){
      errors.value.email = "Слишком длинное значение";
      return errors;
    }
    else if (data.length < 6) {
      errors.value.email = "Слишком короткое значение";
      return errors;
    }
    else if (!NamePattern.test(data)) {
      errors.value.email = "Используются недопустимые значения";
      return errors;
    }
    else {
      errors.value.email = '';
    }
  }
  catch (error) {
  }
}

export const validatePassword = (event: InputEvent) => {
  const data = (event.target as HTMLInputElement).value
  password.value = data
  try{
    const NamePattern =  /^(?=.*[A-ZА-ЯЁ])(?=.*\d).{8,}$/;
    if (!data){
      errors.value.password = "Поле обязательно для заполнения";
      return errors;
    }
    else if (data.length < 8) {
      errors.value.password = "Слишком короткое значение";
      return errors;
    }
    else if (!/[A-ZА-ЯЁ]/.test(data)) {
      errors.value.password = "Должна быть хоть одна заглавная буква";
      return errors;
    }
    else if (!/\d/.test(data)) {
      errors.value.password = "Должна быть хоть одна цифра";
      return errors;
    }
    else {
      errors.value.password = '';
    }
  }
  catch (error) {
  }
}

export const validatePassword2 = (event: InputEvent) => {
  const data = (event.target as HTMLInputElement).value
  try{
    if (!data){
      errors.value.password2 = "Введите пароль еще раз";
      return errors;
    }
    else if (!(data == password.value)){
      errors.value.password2 = "Поле не соответствует паролю";
      return errors;
    }
    else {
      errors.value.password2 = "";
    }
  }
  catch (error) {
  }
}



