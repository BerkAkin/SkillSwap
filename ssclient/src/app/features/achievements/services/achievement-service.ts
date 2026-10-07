import { HttpClient } from '@angular/common/http';
import { Injectable, signal } from '@angular/core';
import { IAchievementModel } from '../models/IAchievementModel';
import { IAchievementResponseModel } from '../models/IAchievementResponseModel';
import { API_ENDPOINTS } from '../../../core/constants/api-endpoints';
import { tap } from 'rxjs';

@Injectable({ providedIn: 'root' })
export class AchievementService {
    constructor(private httpClient: HttpClient) { }

    achievements = signal<IAchievementModel[] | null>(null);

    loadAchievements() {
        if (this.achievements() !== null) {
            return;
        }
        return this.httpClient.get<IAchievementResponseModel>(API_ENDPOINTS.achievements.getAchievements)
            .pipe(
                tap(() => { })
            )
            .subscribe({
                next: response => this.achievements.set(response.data),
                error: error => console.log("An error has occured while fetching the achievements :", error)
            })
    }


}
