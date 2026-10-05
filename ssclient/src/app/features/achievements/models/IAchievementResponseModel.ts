import { IAchievementModel } from "./IAchievementModel";

export interface IAchievementResponseModel {
    message: string;
    data: IAchievementModel[];
}