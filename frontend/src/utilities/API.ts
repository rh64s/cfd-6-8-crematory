import axios from 'axios';
import type {UserRegister} from '@/utilities/typesApi.ts'

const localhost =  'https://example.com/api'


export const register = (userData :UserRegister) => axios.post(localhost + "/auth/register",  userData)








/*
const login = (userData :UserLogin) => axios.post(localhost + "/login",  userData)


.then( function (response){
  console.log(response)
})
  .catch(function (error){
    console.log(error)
  })


“first_name”: "Аркадий",
  “last_name”: "Александрович",
  "patronymic": "Паровозов",
  "login": "ilovemy228",
  "phone": "+88005553535",
  "email": "example@example.com",
  "password": "QWEasd123"
*/
