export interface IUserAdvertDetailsResponseModel {
    message: string;
    detail: {
        id: number;
        status: string;
        created_at: string;
        skill: {
            id: number;
            name: string;
            description: string;
            created_at: string;
        }
    }
}