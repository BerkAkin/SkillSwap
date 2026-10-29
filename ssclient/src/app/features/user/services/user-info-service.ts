import { HttpClient } from '@angular/common/http';
import { Injectable, signal } from '@angular/core';
import { API_ENDPOINTS } from '../../../core/constants/api-endpoints';
import { tap, of } from 'rxjs';
import { IUserDataModel } from '../models/IUserDataModel';
import { IUserDataResponseModel } from '../models/IUserDataResponseModel';
import { IUserInfoUpdateResponseModel } from '../models/IUserInfoUpdateResponseModel';

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


    updateInfo(field: string, fieldValue: string) {
        this.httpClient.put<IUserInfoUpdateResponseModel>(API_ENDPOINTS.me.info, { type: field, value: fieldValue })
            .subscribe({
                next: (response) => { console.log(response) },
                error: (error) => { console.log(error) }
            })
    }

}
