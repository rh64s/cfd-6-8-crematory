import { ref} from 'vue'
import  type { Types }  from '@/utilities/types.ts';



export const navLinkList = ref<Types[]>([
  {
    text: 'о нас',
    link: '#about'
  },
  {
    text: 'наши сотрудники',
    link: '#employees'
  },
  {
    text: 'близким',
    link: '#intimate'
  },
  {
    text: 'услуги',
    link: '#services'
  },
  {
    text: 'вопросы',
    link: '#questions'
  }
])
