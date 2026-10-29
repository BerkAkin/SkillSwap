export interface IUserAdvertModel {
    id: string;
    status: string;
    created_at: string;
    user: {
        id: string;
        firstname: string;
    };
    skill: {
        id: string;
        name: string;
        description: string;
    }
}