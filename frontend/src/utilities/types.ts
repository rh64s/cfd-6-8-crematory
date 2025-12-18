export interface NavLink {
  text: string;
  link: string;
}

export interface Services {
  id: number;
  name: string;
  price: string;
  description: string;
  is_active: boolean;
}

export interface Question {
  id: number;
  title: string;
  text: string;
  isOpen: boolean;
}

export interface Employees {
  id: number;
  avatarLink: string;
  fullName: string;
  position: string;
  task: string;
}

export interface Urn {
  id: number;
  imageLink: string;
  name: string;
  price: string;
  description: string;
  is_active: boolean;
}

export interface PersonalInformation {
  name: string;
  description: string;
}
