import type { Employees } from '@/utilities/types.ts'

export const employeesList: Employees[] = [
  {
    id: 1,
    avatarLink: 'Anna.png',
    fullName: 'Анна Петрова',
    position: 'Руководитель службы организации',
    task: '“Моя задача — сделать так, чтобы все процедуры прошли четко и достойно.”',
  },
  {
    id: 2,
    avatarLink: 'Dmitriy.png',
    fullName: 'Дмитрий Соколов',
    position: 'Старший церемонимейстер',
    task: '“Я создам трогательную и персонализированную службу.”',
  },
  {
    id: 3,
    avatarLink: 'Maria.png',
    fullName: 'Мария Волкова',
    position: 'Консультант по ритуальным вопросам',
    task: '“Я внимательно выслушаю вас и помогу принять решение без лишней спешки.”',
  },
  {
    id: 4,
    avatarLink: 'Igor.png',
    fullName: 'Игорь Николаев',
    position: 'Координатор службы поддержки',
    task: '“Вы можете обратиться к нам в любое время - мы решим возникшие вопросы.”',
  }
]
