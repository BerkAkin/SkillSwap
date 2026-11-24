import { IChatMessageModel } from "./IChatMessageModel";

export interface IChatMessagesResponseModel {
    'message': string;
    'data': IChatMessageModel[];
}