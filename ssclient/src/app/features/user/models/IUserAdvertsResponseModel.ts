import { IUserAdvertModel } from "./IUserAdvertsModel";

export interface IUserAdvertResponseModel {
    message: string;
    data: {
        adverts: IUserAdvertModel[];
        current_page: number;
        last_page: number;
    };
}