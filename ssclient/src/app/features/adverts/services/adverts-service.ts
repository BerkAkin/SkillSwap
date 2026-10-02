import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { IAdvertResponse } from '../models/IAdvertResponse';
import { API_ENDPOINTS } from '../../../core/constants/api-endpoints';

@Injectable({
    providedIn: 'root',
})

export class AdvertsService {
    constructor(private http: HttpClient) { }

    getAdverts() {
        return this.http.get<IAdvertResponse>(API_ENDPOINTS.adverts.getAll);
    }
}
