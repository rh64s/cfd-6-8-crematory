import {ref, computed, createApp} from 'vue'
import { defineStore } from 'pinia'
import type {UserLogin, UserRegister} from '@/utilities/API/typesApi.ts'
import { register } from '@/utilities/API/API.ts'
import router from "@/router";


export const useUsersStore = defineStore('user', () => {
  //const SaveUser = (data: UserRegister) => {
  //}
  const CreateUser = (user : UserRegister) => {
    return register(user)
    .then( function (response){
      router.push('/login')
    })
    .catch(function (error){


    })
  }

  return {CreateUser};
})
