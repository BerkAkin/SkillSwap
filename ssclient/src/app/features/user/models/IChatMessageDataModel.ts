import { IChatMessageModel } from "./IChatMessageModel";

export interface IChatMessageDataModel {
    chat_id: number;
    current_page: number;
    total: number;
    last_page: number;
    messages: IChatMessageModel[];
}
