export interface UserRegister {
  first_name: string;
  last_name: string;
  patronymic: string;
  login: string;
  phone: string;
  email: string;
  password: string;
}

export interface UserLogin {
  login: string;
  password: string;
}
