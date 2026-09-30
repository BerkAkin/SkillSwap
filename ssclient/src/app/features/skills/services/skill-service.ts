import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { ISkillResponseModel } from '../models/ISkillResponseModel';

@Injectable({ providedIn: 'root' })

export class SkillService {
    apiUrl = "http://localhost:8000/api/skills";
    constructor(private http: HttpClient) { }

    getSkills = () => {
        return this.http.get<ISkillResponseModel>(this.apiUrl);
    }

}
