import axios from 'axios';
import type {UserRegister} from '@/utilities/API/typesApi.ts'

const localhost =  'http://localhost/api'


export const register = (userData :UserRegister) => axios.post(localhost + "/auth/register",  userData)
