import { Injectable, signal, Type } from '@angular/core';

@Injectable({ providedIn: "root" })


export class ModalControlService {

    modalType = signal<Type<unknown> | null>(null);
    modalTitle = signal<string>("");
    modalTypeProperties = signal<Record<string, unknown>>({});

    setModal(type: Type<unknown>, title: string, typeProperties?: Record<string, unknown>) {
        this.modalTitle.set(title);
        this.modalType.set(type);
        this.modalTypeProperties.set(typeProperties ?? {});
    }

    closeModal() {
        this.modalTitle.set("");
        this.modalType.set(null);
        this.modalTypeProperties.set({});
    }
}
