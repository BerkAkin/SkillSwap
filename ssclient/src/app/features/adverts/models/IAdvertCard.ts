export interface IAdvertModel {
  id: string;
  status: string;
  created_at: string;
  user: {
    id: number;
    name: string;
  },
  skill: {
    id: number;
    name: string;
    description: string;
  };
}
