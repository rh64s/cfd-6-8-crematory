import type {UserRegister, UserLogin} from '@/utilities/API/typesApi.ts'
import axios from "axios";

const localhost =  'http://localhost/api'


export const register = (userData :UserRegister) => axios.post(localhost + "/auth/register",  userData)
export const login = (userData :UserLogin) => axios.post(localhost + "/auth/login",  userData)
