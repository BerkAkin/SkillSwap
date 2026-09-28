import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { ILoginRequest } from '../models/auth/ILoginRequest';
import { Observable } from 'rxjs';
import { ILoginResponse } from '../models/auth/ILoginResponse';

@Injectable({ providedIn: 'root' })
export class AuthService {
    private apiUrl = 'http://localhost:8000/api/login';

    constructor(private http: HttpClient) { }

    login(data: ILoginRequest): Observable<ILoginResponse> {
        return this.http.post<ILoginResponse>(this.apiUrl, data);
    }
}
