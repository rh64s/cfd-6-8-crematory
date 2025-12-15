import {ref, computed, createApp} from 'vue'
import { defineStore } from 'pinia'
import type {UserLogin, UserRegister} from '@/utilities/types.ts'
import { register } from '@/utilities//API.ts'


export const users = defineStore('user', () => {




  const CreateUser = (user : UserRegister) => {
    return register(user)
    .then( function (response){
      console.log(response)
    })
    .catch(function (error){
      console.log(error)
    })
  }

  return CreateUser;
})
