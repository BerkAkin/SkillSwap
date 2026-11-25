import { IChatMessageModel } from "./IChatMessageModel";

export interface IChatMessageDataModel {
    current_page: number;
    last_page: number;
    total: number;
    data: IChatMessageModel[];
}
