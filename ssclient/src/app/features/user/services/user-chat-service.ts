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
    chat_id = signal<number>(-1);
    current_page = signal<number>(1);
    total_records = signal<number>(0);
    last_page = signal<number>(1);
    chatMessages = signal<IChatMessageModel[] | null>(null);


    getMessages(offerId: number, page: number = 1) {
        this.offerId.set(offerId);
        return this.httpClient.get<IChatMessagesResponseModel>(`${API_ENDPOINTS.adverts.chat}/${this.offerId()}?page=${page}`)
            .pipe(
                map((rsp: IChatMessagesResponseModel) => (
                    {
                        ...rsp,
                        response: {
                            ...rsp.response,
                            messages: this.reverseMessagesOrder(rsp.response.messages)
                        }
                    }
                ))
            )
            .subscribe({
                next: (rsp: IChatMessagesResponseModel) => {
                    this.chatMessages.update((current) => [...rsp.response.messages, ...current || []]);
                    this.current_page.set(rsp.response.current_page);
                    this.total_records.set(rsp.response.total);
                    this.last_page.set(rsp.response.last_page);
                    this.chat_id.set(rsp.response.chat_id);

                    console.log('Chat messages fetched successfully:', rsp);
                },
                error: (error: any) => {
                    console.error('Error fetching chat messages:', error);
                }
            });
    }

    sendMessage(message: string,) {
        this.httpClient.post(`${API_ENDPOINTS.adverts.chat}/${this.chat_id()}`, { message: message })
            .pipe()
            .subscribe({
                next: (response) => console.log(response),
                error: (err) => console.log(err)
            })
    }

    addNewMessageToChatWindow(message: IChatMessageModel) {
        this.chatMessages.update((current) => [...current || [], message]);
    }

    clearChatWindow() {
        this.chatMessages.set(null);
        this.current_page.set(1);
        this.total_records.set(0);
        this.last_page.set(1);
    }

    private reverseMessagesOrder(messages: IChatMessageModel[]): IChatMessageModel[] {
        return messages.slice().reverse();
    }

}
