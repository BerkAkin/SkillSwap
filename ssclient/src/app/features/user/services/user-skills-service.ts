import { HttpClient } from "@angular/common/http";
import { Injectable } from "@angular/core";
import { API_ENDPOINTS } from "../../../core/constants/api-endpoints";


@Injectable({
    providedIn: "root"
})

export class UserSkillsService {
    constructor(private httpClient: HttpClient) { }

    addSkill(id: string, to: 'skills' | 'wishlist') {
        const url = to === 'skills' ? `${API_ENDPOINTS.me.skills}/${id}` : `${API_ENDPOINTS.me.wishlist}/${id}`;
        this.httpClient.post(url, null).subscribe({
            next: (resp) => { console.log(resp) },
            error: (err) => { console.log(err) }
        })
    }

    removeSkill(id: string, from: 'skills' | 'wishlist') {
        const url = from === 'skills' ? `${API_ENDPOINTS.me.skills}/${id}` : `${API_ENDPOINTS.me.wishlist}/${id}`;
        this.httpClient.delete(url).subscribe({
            next: (resp) => { console.log(resp) },
            error: (err) => { console.log(err) }
        })
    }

}
