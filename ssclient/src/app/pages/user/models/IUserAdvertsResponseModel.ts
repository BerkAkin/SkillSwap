import { IUserAdvertModel } from "./IUserAdvertsModel";

export interface IUserAdvertResponseModel {
    message: string;
    data: {
        data: IUserAdvertModel[];
        current_page: number;
        last_page: number;
        per_page: number;
        total: number;
        next_page_url: string | null;
        prev_page_url: string | null;
        from: number | null;
        to: number | null;
    };
}