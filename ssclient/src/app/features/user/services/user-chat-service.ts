import { HttpClient } from '@angular/common/http';
import { Injectable, signal } from '@angular/core';
import { IChatMessagesResponseModel } from '../models/IChatMessagesResponseModel';
import { API_ENDPOINTS } from '../../../core/constants/api-endpoints';
import { IChatMessageModel } from '../models/IChatMessageModel';
import { map } from 'rxjs';

@Injectable({ providedIn: 'root' })
export class UserChatService {
    constructor(private httpClient: HttpClient) { }

    offerId = signal<number | null>(null);
    chatMessages = signal<IChatMessageModel[] | null>(null);


    current_page = signal<number>(1);
    total_records = signal<number>(0);
    last_page = signal<number>(1);



    getMessages(offerId: number, page: number = 1) {
        this.offerId.set(offerId);
        return this.httpClient.get<IChatMessagesResponseModel>(`${API_ENDPOINTS.adverts.chat}/${this.offerId()}?page=${page}`)
            .pipe(
                map((rsp: IChatMessagesResponseModel) => (
                    {
                        ...rsp,
                        response: {
                            ...rsp.response,
                            data: this.reverseMessages(rsp.response.data)
                        }
                    }
                ))
            )
            .subscribe({
                next: (rsp: IChatMessagesResponseModel) => {
                    this.chatMessages.update((current) => [...rsp.response.data, ...current || []]);
                    this.current_page.set(rsp.response.current_page);
                    this.total_records.set(rsp.response.total);
                    this.last_page.set(rsp.response.last_page);

                    console.log('Chat messages fetched successfully:', rsp);
                },
                error: (error: any) => {
                    console.error('Error fetching chat messages:', error);
                }
            });
    }

    clearChatMessages() {
        this.chatMessages.set(null);
        this.current_page.set(1);
        this.total_records.set(0);
        this.last_page.set(1);
    }

    private reverseMessages(messages: IChatMessageModel[]): IChatMessageModel[] {
        return messages.slice().reverse();
    }

}
