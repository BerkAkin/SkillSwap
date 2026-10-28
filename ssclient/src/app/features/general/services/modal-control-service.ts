import { Injectable, signal, Type } from '@angular/core';

@Injectable({ providedIn: 'root' })

export class ModalControlService {

    modalTitle = signal<string>("");
    modalType = signal<Type<unknown> | null>(null);
    modalTypeParameters = signal<Record<string, unknown>>({});

    closeModal = () => {
        this.modalType.set(null);
    }

    setModal = (
        title: string,
        type: Type<unknown>,
        inputs: Record<string, unknown> = {},
    ) => {
        this.modalType.set(type);
        this.modalTitle.set(title);
        this.modalTypeParameters.set(inputs)
    }

}
