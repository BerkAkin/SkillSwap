import { HttpClient } from '@angular/common/http';
import { Injectable, signal } from '@angular/core';
import { IAdvertResponse } from '../models/IAdvertResponse';
import { API_ENDPOINTS } from '../../../core/constants/api-endpoints';
import { IAdvertModel } from '../models/IAdvertCard';
import { tap } from 'rxjs';

@Injectable({
    providedIn: 'root',
})

export class AdvertsService {
    constructor(private http: HttpClient) { }

    adverts = signal<IAdvertModel[] | null>(null);


    getAdverts() {
        if (this.adverts() !== null) {
            return;
        }

        return this.http.get<IAdvertResponse>(API_ENDPOINTS.adverts.getAll)
            .pipe(
                tap(resp => { })
            )
            .subscribe({
                next: response => this.adverts.set(response.data),
                error: error => console.log("Error on fetching adverts", error),
            })
    }
}
