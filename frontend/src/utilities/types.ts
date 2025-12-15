
export interface NavLink {
  text: string;
  link: string;
}

export interface Services {
  id: number;
  summary: string;
  text: string;
}

export interface Accordion {
  id: number;
  title: string;
  text: string;
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
  priceRange: string;
}
