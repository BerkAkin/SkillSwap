import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { ILoginRequest } from '../models/ILoginRequest';
import { ILoginResponse } from '../models/ILoginResponse';
import { IRegisterRequest } from '../models/IRegisterRequest';
import { IRegisterResponse } from '../models/IRegisterResponse';

@Injectable({ providedIn: 'root' })
export class AuthService {
    private loginUrl = 'http://localhost:8000/api/login';
    private registerUrl = 'http://localhost:8000/api/register';

    constructor(private http: HttpClient) { }

    login(data: ILoginRequest): Observable<ILoginResponse> {
        return this.http.post<ILoginResponse>(this.loginUrl, data);
    }

    register(data: IRegisterRequest): Observable<IRegisterResponse> {
        return this.http.post<IRegisterResponse>(this.registerUrl, data);
    }
}
