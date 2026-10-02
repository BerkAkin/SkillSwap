import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { ISkillResponseModel } from '../models/ISkillResponseModel';
import { API_ENDPOINTS } from '../../../core/constants/api-endpoints';

@Injectable({ providedIn: 'root' })

export class SkillService {

    constructor(private http: HttpClient) { }

    getSkills = () => {
        return this.http.get<ISkillResponseModel>(API_ENDPOINTS.skills.getAll);
    }

}
