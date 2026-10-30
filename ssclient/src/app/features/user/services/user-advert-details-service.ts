import { HttpClient } from '@angular/common/http';
import { Injectable, signal } from '@angular/core';
import { API_ENDPOINTS } from '../../../core/constants/api-endpoints';
import { IUserAdvertDetailsResponseModel } from '../models/IUserAdvertDetailsResponseModel';
import { IUserAdvertOffersResponseModel } from '../models/IUserAdvertOffersResponseModel';
import { switchMap } from 'rxjs';

@Injectable({ providedIn: 'root' })
export class UserAdvertDetailsService {
    constructor(private httpClient: HttpClient) { }

    advertDetailsResponse = signal<IUserAdvertDetailsResponseModel | null>(null);
    offersResponse = signal<IUserAdvertOffersResponseModel | null>(null);

    public getAdvertOffers(page: number = 1) {
        return this.httpClient.get<IUserAdvertOffersResponseModel>(
            `${API_ENDPOINTS.adverts.offers}?advertId=${this.advertDetailsResponse()?.detail.id}&page=${page}`
        )
    }

    public getAdvertDetails(id: string) {
        return this.httpClient.get<IUserAdvertDetailsResponseModel>(
            `${API_ENDPOINTS.me.adverts}/${id}`
        )
    }

    public getData(id: string) {
        this.getAdvertDetails(id).pipe(
            switchMap(advertResponse => {
                this.advertDetailsResponse.set(advertResponse);
                return this.getAdvertOffers(advertResponse.detail.id);
            })
        ).subscribe({
            next: response => this.offersResponse.set(response),
            error: err => console.log(err)
        });
    }

    public changeOfferPage(page: number) {
        this.getAdvertOffers(page).subscribe({
            next: (response) => this.offersResponse.set(response),
            error: (error) => console.log("an error has occured while changing the page: ", error)
        })
    }

    public nextPage() {
        const response = this.offersResponse();
        if (!response) return;

        const currentPage = response.offers.current_page;
        const lastPage = response.offers.last_page;

        if (currentPage < lastPage) {
            this.changeOfferPage(currentPage + 1);
        }
    }

    public previousPage() {
        const response = this.offersResponse();
        if (!response) return;

        const currentPage = response.offers.current_page;

        if (currentPage > 1) {
            this.changeOfferPage(currentPage - 1);
        }
    }


}
