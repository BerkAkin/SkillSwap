import { HttpClient } from '@angular/common/http';
import { Injectable, signal } from '@angular/core';
import { API_ENDPOINTS } from '../../../core/constants/api-endpoints';
import { IUserAdvertResponseModel } from '../models/IUserAdvertsResponseModel';

@Injectable({ providedIn: 'root' })

export class UserAdvertService {
    constructor(private httpClient: HttpClient) { }

    userAdvertsResponse = signal<IUserAdvertResponseModel | null>(null);

    public loadUserAdverts(page: number = 1) {
        this.httpClient.get<IUserAdvertResponseModel>(`${API_ENDPOINTS.me.userAdverts}?page=${page}`)
            .subscribe({
                next: (response) => { this.userAdvertsResponse.set(response); console.log(response) },
                error: (err) => { console.log(err) }
            });
    }

    public nextPage() {
        const response = this.userAdvertsResponse();
        if (!response) return;

        const currentPage = response.data.current_page;
        const lastPage = response.data.last_page;

        if (currentPage < lastPage) {
            this.loadUserAdverts(currentPage + 1);
        }
    }

    public previousPage() {
        const response = this.userAdvertsResponse();
        if (!response) return;

        const currentPage = response.data.current_page;

        if (currentPage > 1) {
            this.loadUserAdverts(currentPage - 1);
        }
    }

}
