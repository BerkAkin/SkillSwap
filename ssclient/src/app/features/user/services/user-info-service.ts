import { HttpClient } from '@angular/common/http';
import { Injectable, signal } from '@angular/core';
import { IUserDataModel } from '../../../pages/user/models/IUserDataModel';
import { IUserDataResponseModel } from '../../../pages/user/models/IUserDataResponseModel';
import { API_ENDPOINTS } from '../../../core/constants/api-endpoints';
import { tap, of } from 'rxjs';

@Injectable({
    providedIn: "root"
})

export class UserInfoService {
    constructor(private httpClient: HttpClient) { }
    userdata = signal<IUserDataModel | null>(null);

    loadUserData() {
        if (this.userdata() !== null) {
            return;
        }
        return this.httpClient.get<IUserDataResponseModel>(API_ENDPOINTS.me.info)
            .pipe(tap(resp => { }))
            .subscribe({
                next: response => { this.userdata.set(response.data); console.log(this.userdata()) },
                error: err => console.log("Error on fetching user info: ", err)
            })
    }
}
