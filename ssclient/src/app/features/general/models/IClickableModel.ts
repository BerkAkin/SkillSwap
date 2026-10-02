type colors = 'orange' | 'emerald' | 'sky' | 'red' | 'stone';
type objType = 'button' | 'anchor';

export interface IClickableModel {
    type: objType;
    text: string;
    colorScheme: colors;

    btnFn?: () => any;
    btnType?: string;

    anchURL?: string;
}