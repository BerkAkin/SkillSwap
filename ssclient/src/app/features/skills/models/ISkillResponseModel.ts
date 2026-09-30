import { ISkillModel } from "./ISkillModel";

export interface ISkillResponseModel {
    'message': string;
    'data': ISkillModel[];
}