import { HttpClient } from '@angular/common/http';
import { Injectable, signal } from '@angular/core';
import { Observable, tap } from 'rxjs';
import { ILoginRequest } from '../models/ILoginRequest';
import { ILoginResponse } from '../models/ILoginResponse';
import { IRegisterRequest } from '../models/IRegisterRequest';
import { IRegisterResponse } from '../models/IRegisterResponse';
import { API_ENDPOINTS } from '../../../core/constants/api-endpoints';


@Injectable({ providedIn: 'root' })
export class AuthService {

    private authenticated = signal<boolean>(!!localStorage.getItem('ss-access-token'));
    public isAuthenticated = this.authenticated.asReadonly();

    constructor(private http: HttpClient) { }

    login(data: ILoginRequest): Observable<ILoginResponse> {
        return this.http.post<ILoginResponse>(API_ENDPOINTS.auth.login, data).pipe(
            tap((response: ILoginResponse) => {
                localStorage.setItem('ss-access-token', response.data);
                this.authenticated.set(true);
            })
        )
    }

    register(data: IRegisterRequest): Observable<IRegisterResponse> {
        return this.http.post<IRegisterResponse>(API_ENDPOINTS.auth.register, data);
    }

    logout() {
        localStorage.removeItem('ss-access-token');
        this.authenticated.set(false);
    }
}
