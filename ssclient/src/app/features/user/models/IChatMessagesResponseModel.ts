import { IChatMessageDataModel } from "./IChatMessageDataModel";

export interface IChatMessagesResponseModel {
    message: string;
    response: IChatMessageDataModel;
}