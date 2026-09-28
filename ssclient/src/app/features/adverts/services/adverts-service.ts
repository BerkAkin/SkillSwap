import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { IAdvertResponse } from '../models/IAdvertResponse';

@Injectable({
    providedIn: 'root',
})

export class AdvertsService {
    private apiUrl = 'http://localhost:8000/api/adverts';
    constructor(private http: HttpClient) { }

    getAdverts() {
        return this.http.get<IAdvertResponse>(this.apiUrl);
    }
}
