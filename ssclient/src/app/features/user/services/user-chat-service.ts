import { HttpClient } from '@angular/common/http';
import { Injectable, signal } from '@angular/core';
import { IChatMessagesResponseModel } from '../models/IChatMessagesResponseModel';
import { API_ENDPOINTS } from '../../../core/constants/api-endpoints';

@Injectable({ providedIn: 'root' })
export class UserChatService {
    constructor(private httpClient: HttpClient) { }

    chatMessages = signal<IChatMessagesResponseModel | null>(null);

    getMessages(offerId: number) {
        return this.httpClient.get<IChatMessagesResponseModel>(`${API_ENDPOINTS.adverts.chat}/${offerId}`)
            .pipe()
            .subscribe({
                next: (response: IChatMessagesResponseModel) => {
                    this.chatMessages.set(response);
                },
                error: (error: any) => {
                    console.error('Error fetching chat messages:', error);
                }
            });
    }

}
