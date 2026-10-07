import { HttpClient } from '@angular/common/http';
import { Injectable, signal } from '@angular/core';
import { ISettingRepsoneModel } from '../models/ISettingResponseModel';
import { ISettingModel } from '../models/ISettingModel';
import { tap, of } from 'rxjs';
import { API_ENDPOINTS } from '../../../core/constants/api-endpoints';

@Injectable({ providedIn: 'root' })
export class SettingsService {
    constructor(private httpClient: HttpClient) { }

    settings = signal<ISettingModel[] | null>(null);

    loadSettings() {
        if (this.settings() !== null) {
            return;
        }

        this.httpClient.get<ISettingRepsoneModel>(API_ENDPOINTS.settings.getSettings)
            .pipe(
                tap(() => { })
            )
            .subscribe({
                next: (response) => { console.log(response.data); this.settings.set(response.data) },
                error: (error) => console.log('an error has occured while loading settings: ', error)
            })
    }
}
