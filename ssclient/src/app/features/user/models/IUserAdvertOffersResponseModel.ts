export interface IUserAdvertOffersResponseModel {
    message: string;
    offers: {
        current_page: number;
        last_page: number;
        data: {
            id: number;
            status: string;
            offer_user: {
                id: number;
                username: string;
            };
            offer_skill: {
                id: number;
                name: string;
            };
        }[];
    };
}