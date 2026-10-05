import { HttpClient } from '@angular/common/http';
import { Injectable, signal } from '@angular/core';
import { ISkillResponseModel } from '../models/ISkillResponseModel';
import { API_ENDPOINTS } from '../../../core/constants/api-endpoints';
import { ISkillModel } from '../models/ISkillModel';

@Injectable({ providedIn: 'root' })
export class SkillService {

    skills = signal<ISkillModel[] | null>(null);

    constructor(private http: HttpClient) { }

    getSkills() {
        if (this.skills() !== null) {
            return;
        }

        this.http.get<ISkillResponseModel>(API_ENDPOINTS.skills.getAll)
            .subscribe({
                next: response => this.skills.set(response.data),
                error: error => console.log('API ERROR:', error)
            });
    }
}