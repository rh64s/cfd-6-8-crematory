import { defineStore } from 'pinia'
import type {UserLogin, UserRegister} from '@/utilities/API/typesApi.ts'
import { register, login } from '@/utilities/API/API.ts'
import router from "@/router";
import {ref} from "vue";


export const useUsersStore = defineStore('user', () => {

  const errorRegistr = ref<string>()
  const errorLogin = ref<string>()

  const LoginUser = (user :UserLogin) => {
    return login(user)
      .then( function (response){
        router.push('/')
      })
      .catch(function (error){
       errorLogin.value =  "Не верны логин или пароль"
      })
  }


  const CreateUser = (user : UserRegister) => {
    return register(user)
    .then( function (response){
      router.push('/login')
    })
    .catch(function (error){
      errorRegistr.value =  "Не верны логин или пароль"
    })
  }
  return {CreateUser, LoginUser, errorLogin, errorRegistr};
})


