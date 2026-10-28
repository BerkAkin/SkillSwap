import { Injectable, signal, Type } from '@angular/core';

@Injectable({ providedIn: 'root' })

export class ModalControlService {

    modalTitle = signal<string>("");
    modalContent = signal<Type<unknown> | null>(null);
    modalInputs = signal<Record<string, unknown>>({});

    closeModal = () => {
        this.modalContent.set(null);
    }

    setModal = (
        title: string,
        type: Type<unknown>,
        inputs: Record<string, unknown> = {},
    ) => {
        this.modalContent.set(type);
        this.modalTitle.set(title);
        this.modalInputs.set(inputs)
    }

}
